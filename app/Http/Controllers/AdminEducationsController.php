<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminEducationsController extends Controller
{
    public function index(Request $request)
    {
        $educations = Education::filter(request(['search']))->latest()->paginate(10)->withQueryString();

        return view('admin.educations.index', ['title' => 'Educations'], compact('educations'));
    }

    public function __construct()
    {
        Paginator::defaultView('vendor.pagination.custom');
    }

    public function show(Education $education)
    {
        return view('admin.educations.show', ['title' => 'Detail Edukasi'], compact('education'));
    }

    public function create()
    {
        return view('admin.educations.create', ['title' => 'Buat Edukasi']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // jika image kosong, maka skip, jika ada simpan
        if (!$request->file('thumbnail')) {
            Education::create([
                'title' => $request->title,
                'author_id' => Auth::user()->id,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
            ]);

            return redirect('/admin/educations')->with('addEducationSuccess', 'Edukasi berhasil ditambahkan');
        }

        $image = $request->file('thumbnail');
        $image->storeAs('public/images', $image->hashName());

        Education::create([
            'title' => $request->title,
            'author_id' => Auth::user()->id,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'thumbnail' => $image->hashName(),
        ]);

        return redirect('/admin/educations')->with('addEducationSuccess', 'Edukasi berhasil ditambahkan');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', ['title' => 'Edit Edukasi'], compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->file('thumbnail')) {
            Storage::delete('public/images/' . $education->thumbnail);

            $image = $request->file('thumbnail');
            $image->storeAs('public/images', $image->hashName());

            $education->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
                'thumbnail' => $image->hashName(),
            ]);
        } else {
            $education->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'body' => $request->body,
            ]);
        }

        return redirect('/admin/educations')->with('editEducationSuccess', 'Edukasi berhasil diubah');
    }

    public function destroy(Education $education)
    {
        Storage::delete('public/images/' . $education->thumbnail);
        $education->delete();

        return redirect('/admin/educations')->with('deleteEducationSuccess', 'Edukasi berhasil dihapus');
    }
}
