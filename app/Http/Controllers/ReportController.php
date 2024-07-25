<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Mail\ReportNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function index()
    {
        return view('report', ['title' => 'Aduan']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'other-category' => 'required_if:category,Yang Lain',
            'description' => 'required',
            'location' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // jika category 'Yang Lain', simpan other-category
        if ($request->category == 'Yang Lain') {
            $category = $request->input('other-category');
        } else {
            $category = $request->category;
        }

        $image = $request->file('photo');
        $image->storeAs('public/photos', $image->hashName());

        $report = Report::create([
            'category' => $category,
            'author_id' => Auth::user()->id,
            'description' => $request->description,
            'location' => $request->location,
            'photo' => $image->hashName(),
        ]);

        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new ReportNotification($report));
        }

        return redirect('/report')->with('addReportSuccess', 'Aduan berhasil ditambahkan');
    }
}
