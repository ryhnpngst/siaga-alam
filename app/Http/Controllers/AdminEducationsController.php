<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminEducationsController extends Controller
{
    public function index()
    {
        return view('admin.educations', ['title' => 'Educations']);
    }
}
