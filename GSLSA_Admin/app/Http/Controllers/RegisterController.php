<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        if (Auth::check() && Auth::user()->is_superuser) {
            $users = User::all();
            return view('register', compact('users'));
        }

        return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
    }

    public function register(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_superuser) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to perform this action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('register')->with('success', 'User created successfully.');
    }
    public function editUser(User $user)
    {
        if (!Auth::check() || !Auth::user()->is_superuser) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this page.');
        }
        $users = User::all();
        return view('registeruseredit', compact('user', 'users'));
    }

    public function updateUser(Request $request, User $user)
    {
        if (!Auth::check() || !Auth::user()->is_superuser) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to perform this action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Ignore current user for uniqueness
            'password' => 'required|string|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('register')->with('success', 'User updated successfully.');
    }

    public function userDelete(User $user)
    {
        if (!Auth::check() || !Auth::user()->is_superuser) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to perform this action.');
        }

        $user->delete();

        return redirect()->route('register')->with('success', 'User deleted successfully.');
    }
}
