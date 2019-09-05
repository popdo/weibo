<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    // 关注
    public function store(User $user){
        $this->authorize('follow',$user);//不能关注自己

        if ( ! Auth::user()->isFollowing($user->id)) {
            Auth::user()->follow($user->id);
        }

        session()->flash('success','关注成功!');
        return back();
    }

    // 取消关注
    public function destroy(User $user){
        $this->authorize('follow',$user);//不能关注自己

        if (Auth::user()->isFollowing($user->id)) {
            Auth::user()->unfollow($user->id);
        }
        session()->flash('success','成功取消关注!');
        return back();
    }
}
