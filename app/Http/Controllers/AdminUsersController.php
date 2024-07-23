<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users', ['title' => 'Users'], compact('users'));
    }
}
