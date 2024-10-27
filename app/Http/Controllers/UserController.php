<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.backend.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('pages.backend.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|integer|exists:roles,id',
            'from_school' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string|max:255',
            'exam_score' => 'nullable',
            'english_score' => 'nullable',
            'math_score' => 'nullable',
            'culture_score' => 'nullable',
            'tech_score' => 'nullable',
            'school_year' => 'nullable|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'from_school' => $request->from_school,
            'age' => $request->age,
            'gender' => $request->gender,
            'exam_score' => $request->exam_score,
            'english_score' => $request->english_score,
            'math_score' => $request->math_score,
            'culture_score' => $request->culture_score,
            'tech_score' => $request->tech_score,
            'school_year' => $request->school_year,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('pages.backend.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|integer|exists:roles,id',
            'from_school' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string|max:255',
            'exam_score' => 'nullable',
            'english_score' => 'nullable',
            'math_score' => 'nullable',
            'culture_score' => 'nullable',
            'tech_score' => 'nullable',
            'school_year' => 'nullable|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role_id' => $request->role_id,
            'from_school' => $request->from_school,
            'age' => $request->age,
            'gender' => $request->gender,
            'exam_score' => $request->exam_score,
            'english_score' => $request->english_score,
            'math_score' => $request->math_score,
            'culture_score' => $request->culture_score,
            'tech_score' => $request->tech_score,
            'interview_score' => $request->interview_score,
            'school_year' => $request->school_year,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function userList()
    {
        $users = User::where('role_id', 2)->get();
        return view('pages.backend.users.userList', compact('users'));
    }
}
