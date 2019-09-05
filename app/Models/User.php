<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable; // 消息通知相关功能引
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * 当我们需要对用户密码或其它敏感信息在用户实例通过数组或 JSON 显示时进行隐藏，则可使用 hidden 属性：
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = Str::random(10);
        });
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 获取gravatar头像
    public function gravatar ($size=100){
        // 通过 $this->attributes['email'] 获取到用户的邮箱；
        // 用 strtolower 方法将邮箱转换为小写，并md5转码
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }

    public function statuses (){
        return $this->hasMany('App\Models\Status');
    }

    // 首页显示自己与已关注的的所有微博
    // 该章节具体教程 https://learnku.com/courses/laravel-essential-training/5.8/dynamic-flow/4119
    public function feed(){
        // 1、通过 followings 方法取出所有关注用户的信息，再借助 pluck 方法将 id 进行分离并赋值给 user_ids
        $user_ids = $this->followings->pluck('id')->toArray();

        // 2、将当前用户的 id 加入到 user_ids 数组中；
        array_push($user_ids, $this->id);

        // 3、使用 Laravel 提供的 查询构造器 whereIn 方法取出所有用户的微博动态并进行倒序排序；
        return Status::whereIn('user_id', $user_ids)->with('user')->orderBy('created_at', 'desc');

        // 使用了 Eloquent 关联的 预加载 with 方法，预加载避免了 N+1 查找的问题，大大提高了查询效率。N+1 问题

    }


    // 多对多关系

    // 用户粉丝列表 $user->followers()
    public function followers(){
        // 参数1: 一个用户拥有多个粉丝 (一个user拥有多个user)
        // 参数2: 指定关联表名(不指定的话 系统会默认将两个模型_连接 自动起名为 user_user)
        // 参数3: user_id 是定义在关联中的模型外键名 
        // 参数4: follower_id 是要合并的模型外键名
        return $this->belongsToMany(User::Class, 'followers', 'user_id', 'follower_id');
    }

    // 用户关注列表 $user->followings();
    public function followings(){
        return $this->belongsToMany(User::Class, 'followers', 'follower_id', 'user_id');
    }

    // 关注
    public function follow($user_ids){
        if ( ! is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids, false);
    }

    // 取消关注
    public function unfollow($user_ids){
        if ( ! is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    // 判断当前登录的用户 A 是否关注了用户 B
    public function isFollowing($user_id)
    {
        // 用contains方法 判断用户 B 是否包含在用户 A 的关注人列表上即可
        return $this->followings->contains($user_id);
    }
}
