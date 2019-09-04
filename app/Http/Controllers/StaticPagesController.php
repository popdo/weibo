<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home (){
        $feed_items = [];
        if (auth()->check()) {
            // $feed_items = auth()->user()->feed()->paginate(30);
            $feed_items = auth()->user()->statuses()->orderBy('created_at','desc')->paginate(20);
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
