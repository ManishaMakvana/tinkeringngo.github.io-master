<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Admin Dashboard
    public function index()
    {
        $totalUsers = User::count();
        $totalModules = Program::count();

        return view('admin.dashboard', compact('totalUsers', 'totalModules'));
    }

    public function dashboard()
    {
        $totalUsers = User::count(); // Count total users
        $totalModules = Program::count(); // Count total modules

        // Return the admin dashboard view with the data
        return view('admin.dashboard', compact('totalUsers', 'totalModules'));
    }

    // Manage Users
    public function users(Request $request)
    {
        $search = $request->get('search'); // Get the search term from the request
        $users = User::when($search, function ($query, $search) {
            $query->where('username', 'LIKE', "%{$search}%")
                  ->orWhere('programid', 'LIKE', "%{$search}%");
        })->get();

        return view('admin.users', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'programid' => 'required|string|max:255',
        ]);

        $user->update($request->only(['username', 'programid']));
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // Admin Login/Logout
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::login($admin);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // Search and display modules
    public function modules(Request $request)
    {
        $search = $request->get('search'); // Get the search term from the request
        $programs = Program::when($search, function ($query, $search) {
            $query->where('programid', 'LIKE', "%{$search}%")
                  ->orWhere('title', 'LIKE', "%{$search}%")
                  ->orWhere('module_id', 'LIKE', "%{$search}%");
        })->get();

        return view('admin.modules', compact('programs'));
    }




}
