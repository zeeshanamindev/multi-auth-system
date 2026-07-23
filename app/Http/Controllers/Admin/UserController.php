<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => ['required', Rule::in(['admin', 'manager', 'editor', 'user'])],
            'is_active' => 'sometimes|boolean',
        ]);

        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'is_active' => $request->has('is_active') ? true : false,
        ];

        $user = User::create($userData);

        if ($user) {
            return redirect()->route('admin.users.index')
                ->with('success', 'User created successfully!');
        }

        return back()->with('error', 'Failed to create user. Please try again.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if ($user->id === 1 && Auth::user()->id !== 1) {
            return back()->with('error', 'You cannot edit the master admin account.');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', Rule::in(['admin', 'manager', 'editor', 'user'])],
            'is_active' => 'sometimes|boolean',
        ]);

        // Prevent changing own role
        if ($user->id === Auth::id() && $validated['role'] !== Auth::user()->role) {
            return back()->with('error', 'You cannot change your own role.');
        }

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'is_active' => $request->has('is_active') ? true : false,
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:8|confirmed',
            ]);
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        // Prevent deleting yourself
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot delete your own account.');
        }

        // Prevent deleting master admin
        if ($user->id === 1) {
            return back()->with('error', 'You cannot delete the master admin account.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully!');
    }

    public function activate(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot activate yourself.');
        }

        $user->update(['is_active' => true]);
        return back()->with('success', 'User activated successfully!');
    }

    public function deactivate(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot deactivate yourself.');
        }

        if ($user->id === 1) {
            return back()->with('error', 'You cannot deactivate the master admin.');
        }

        $user->update(['is_active' => false]);
        return back()->with('success', 'User deactivated successfully!');
    }
}