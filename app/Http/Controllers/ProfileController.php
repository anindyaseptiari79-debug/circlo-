<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // UI-03 Profile Page — use case: Manage profile (View profile)
    public function show(Request $request)
    {
        return view('profile.show', [
            'student' => $request->user(),
        ]);
    }
}
