<?php

namespace App\Http\Controllers;

use App\Http\Requests\createStatusRequest;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(createStatusRequest $request){
        auth()->user()->statuses()->create([
            'content' => $request->content
        ]);
        session()->flash('success','提交成功！');
        return back();
    }

    public function destroy($user){
        //
    }
}
