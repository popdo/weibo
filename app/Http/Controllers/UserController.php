<?php

namespace App\Http\Controllers;

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

    public function store (Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }

    
}
