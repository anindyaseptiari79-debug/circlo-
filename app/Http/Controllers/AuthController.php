<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // UI-01 Login Page (Login & Register tabs)
    public function showLogin(Request $request)
    {
        return view('auth.login', [
            'tab' => old('form', $request->query('tab', 'login')),
        ]);
    }

    // Use case: Register (insert form)
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'student_id' => ['required', 'digits:10', 'unique:users,student_id'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'student_id.unique' => 'An account with this Student ID already exists. Please log in instead.',
            'email.unique' => 'An account with this email already exists. Please log in instead.',
            'password.confirmed' => 'The password and confirmation do not match.',
        ]);

        User::create($data + ['account_status' => 'Active']);

        return redirect()->route('login')
            ->with('success', 'Account created! Please log in with your new account.');
    }

    // Use case: Login (email or Student ID + password)
    public function login(Request $request)
    {
        $request->validate([
            'identifier' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $field = filter_var($request->identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'student_id';
        $credentials = [$field => $request->identifier, 'password' => $request->password];

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withInput($request->only('identifier'))
                ->withErrors(['identifier' => 'Incorrect email/Student ID or password.']);
        }

        if (Auth::user()->account_status !== 'Active') {
            Auth::logout();

            return back()->withInput($request->only('identifier'))
                ->withErrors(['identifier' => 'Your account has been suspended. Please contact the Admin.']);
        }

        $request->session()->regenerate();

        return redirect()->route('profile.show');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
