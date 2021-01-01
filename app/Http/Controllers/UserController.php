<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    public function userList(){
        $users = User::orderBy('id','ASC')->get();
        return view('back-end.users',compact('users'));
    }
}
