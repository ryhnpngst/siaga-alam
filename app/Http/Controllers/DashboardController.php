<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // cek apakah ada data Report berdasarkan user yang login
        $reports = Report::where('author_id', auth()->user()->id)->get();
        // jika tidak ada, maka akan menampilkan data kosong


        return view('dashboard.index', ['title' => 'Dashboard'], compact('reports'));
    }
}
