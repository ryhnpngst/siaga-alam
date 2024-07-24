<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::filter(request(['search']))->latest()->paginate(10)->withQueryString();

        return view('admin.users.index', ['title' => 'Users'], compact('users'));
    }

    public function __construct()
    {
        Paginator::defaultView('vendor.pagination.custom');
    }

    public function create()
    {
        return view('admin.users.create', ['title' => 'Tambah Pengguna']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'in:user,admin',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255|',
        ]);

        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/admin/users')->with('addUserSuccess', 'Pengguna berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['title' => 'Edit Pengguna'], compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'in:user,admin',
            'username' => 'required|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email:dns|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|max:255|',
        ]);

        if ($request->password) {
            $user->update([
                'name' => $request->name,
                'role' => $request->role,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'role' => $request->role,
                'username' => $request->username,
                'email' => $request->email,
            ]);
        }

        return redirect('/admin/users')->with('editUserSuccess', 'Pengguna berhasil diubah');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin/users')->with('deleteUserSuccess', 'Pengguna berhasil dihapus');
    }
}
