<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserRequest;
use App\Http\Requests\updateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index', 'confirmEmail']
        ]);

        // 只允许未登录用户访问
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function index (){
        $users = User::paginate(9);
        return view('users.index',compact('users'));
    }

    public function create (){
        return view('users.create');
    }

    public function show (User $user){
        $statuses = $user->statuses()->orderBy('created_at','desc')->paginate(20);
        return view('users.show',compact('user','statuses'));
    }

    // 用户注册
    public function store (createUserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 引用发送邮件方法
        $this->sendEmailConfirmationTo($user);
        session()->flash('success', '验证邮件已发送到你的注册邮箱上，请注意查收。');
        return redirect('/');
    }

    // 发送邮件
    protected function sendEmailConfirmationTo($user)
    {
        // $view = 'emails.confirm';
        // $data = compact('user');
        // $from = 'bme@qq.com';
        // $name = 'jim';
        // $to = $user->email;
        // $subject = "感谢注册 Weibo 应用！请确认你的邮箱。";

        // Mail::send($view, $data, function ($message) use ($from, $name, $to, $subject) {
        //     $message->from($from, $name)->to($to)->subject($subject);
        // });



        $view = 'emails.confirm';
        $data = compact('user');
        $to = $user->email;
        $subject = "感谢注册 Weibo 应用！请确认你的邮箱。";

        Mail::send($view, $data, function ($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    // 邮件确认
    public function confirmEmail($token)
    {
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，激活成功！');
        return redirect()->route('users.show', [$user]);
    }


    public function edit (User $user){
        $this->authorize('update', $user); //只能进入自己的编辑页
        return view('users.edit', compact('user'));
    }

    public function update (updateUserRequest $request,User $user){
        $this->authorize('update', $user); //只能提交自己的编辑
        $user->update([
            'name' => $request->name,
            'password' => $request->password ? bcrypt($request->password):$user->password
        ]);
        session()->flash('success','个人信息更新成功');
        return back();
    }

    public function destroy (User $user){
        $this->authorize('destroy',$user);
        $user->delete();
        session()->flash('success','删除成功！');
        return back();
    }

    
}
