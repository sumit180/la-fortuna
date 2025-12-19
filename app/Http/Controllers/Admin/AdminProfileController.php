<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function edit(): \Illuminate\Contracts\View\View
    {
        return view('admin.profile.password');
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password:admin'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $admin = Auth::guard('admin')->user();
        $admin->password = Hash::make($validated['password']);
        $admin->save();

        return redirect()->route('admin.password.edit')->with('status', 'Password updated successfully.');
    }
}
