<?php

namespace App\Http\Controllers;

use App\Http\Requests\createUserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create (){
        return view('users.create');
    }

    public function show (User $user){
        return view('users.show',compact('user'));
    }

    public function store (createUserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        
        // 注册完让用户自动登录
        auth()->login($user);
        
        // 临时会话 session()->flash()仅在下次请求内有效，之后可以在其他地方使用session()->get('success')获取这条信息
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');

        return redirect()->route('users.show', [$user]);
        // 以上代码等同于：
        // redirect()->route('users.show', [$user->id]);
    }

    
}
