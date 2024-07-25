<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminReportsController extends Controller
{
    public function index()
    {
        $reports = Report::filter(request(['search']))->latest()->paginate(10)->withQueryString();

        return view('admin.reports.index', ['title' => 'Reports'], compact('reports'));
    }

    public function __construct()
    {
        Paginator::defaultView('vendor.pagination.custom');
    }

    public function create()
    {
        return view('admin.reports.create', ['title' => 'Tambah Laporan']);
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
