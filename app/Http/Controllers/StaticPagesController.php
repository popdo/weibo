<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home (){
        $feed_items = [];
        if (auth()->check()) {
            // 首页显示自己与已关注的的所有微博
            $feed_items = auth()->user()->feed()->paginate(20);
        }else{
            // 未登陆显示所有微博
            $feed_items = Status::paginate(20);
            // dd($feed_items);
        }

        return view('static_pages.home',compact('feed_items'));
    }
    public function help (){
        return view('static_pages.help');
    }
    public function about (){
        return view('static_pages.about');
    }
}
