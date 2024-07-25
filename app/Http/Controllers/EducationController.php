<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::filter(request(['search', 'author']))->latest()->paginate(10)->withQueryString();

        return view('educations', ['title' => 'Edukasi'], compact('educations'));
    }

    public function getEducationByUser(User $user)
    {
        $educations = $user->educations()->paginate(10)->withQueryString();

        return view('educations', compact('educations'));
    }

    public function show(Education $education)
    {
        return view('education', ['title' => 'Edukasi'], compact('education'));
    }
}
