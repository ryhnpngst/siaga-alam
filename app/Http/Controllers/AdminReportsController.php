<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

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

    public function show(Report $report)
    {
        return view('admin.reports.show', ['title' => 'Detail Laporan'], compact('report'));
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit(Report $report)
    {
        return view('admin.reports.edit', ['title' => 'Edit Laporan'], compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            // 'category' => 'required',
            // 'other-category' => 'required_if:category,Yang Lain',
            // 'description' => 'required',
            // 'location' => 'required',
            // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required',
        ]);

        // if ($request->category == 'Yang Lain') {
        //     $category = $request->input('other-category');
        // } else {
        //     $category = $request->category;
        // }

        // if ($request->file('photo')) {
        //     Storage::delete('public/photos/' . $report->photo);

        //     $photo = $request->file('photo');
        //     $photo->storeAs('public/photos', $photo->hashName());

        //     $report->update([
        //         'category' => $category,
        //         'description' => $request->description,
        //         'location' => $request->location,
        //         'photo' => $photo->hashName(),
        //     ]);
        // } else {
        //     $report->update([
        //         'category' => $category,
        //         'description' => $request->description,
        //         'location' => $request->location,
        //     ]);
        // }

        $report->update([
            'status' => $request->status,
        ]);

        return redirect('/admin/reports')->with('editReportSuccess', 'Status laporan berhasil diperbarui menjadi ' . $request->status);
    }

    public function destroy(Report $report)
    {
        Storage::delete('public/photos/' . $report->photo);

        $report->delete();

        return redirect('/admin/reports')->with('deleteReportSuccess', 'Laporan berhasil dihapus');
    }
}
