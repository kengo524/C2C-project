<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterEditController extends Controller
{
    public function index()
    {
        $login_user_id = auth()->user()->id;
        $user = User::find($login_user_id);
        return view('register.edit.index', compact('user'));
    }
}
