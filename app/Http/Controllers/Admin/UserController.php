<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'sub')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'sub',
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Sub admin created successfully.');
    }

    public function edit(User $user)
    {
        if ($user->role !== 'sub') {
            abort(404);
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->role !== 'sub') {
            abort(404);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        $data = $request->only('name', 'email');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Sub admin updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->role !== 'sub') {
            abort(404);
        }
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'Sub admin deleted successfully.');
    }
}
