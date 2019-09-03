<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionController extends Controller
{
    // 注册页只允许未登录用户可以访问
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create (){
        return view('session.create');
    }

    public function store (Request $request){
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        // 借助 Laravel 提供的 Auth 的 attempt 方法可以让我们很方便的完成用户的身份认证操作
        if (Auth::attempt($credentials,$request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
            $fallback = route('users.show', Auth::user());
            return redirect()->intended($fallback);//该方法可以让用户登录之后跳转到登录之前请求的页面地址
            // return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput(); //重定向上次操作页面，withInput() 后模板里 old('email') 将能获取到上一次用户提交的内容
        }
 
    }

    public function destroy (){
        // 用户退出登录
        Auth::logout();
        // 闪存一条消息
        session()->flash('success', '您已成功退出！');
        // 重定向到登录页
        return redirect('login');
    }
}
