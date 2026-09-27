<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:1',
            ],
            [
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please provide a valid email address.',
                'email.unique' => 'This email is already registered.',
                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least be 1 character long.',
            ]
        );

        $user = User::create([
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        if (!$user) {
            return redirect()->back()->with('failure', 'Your account could not be created.');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('account')
                ->with('success', 'Account created successfully.'); // Cookie for 1 hour
    }

}
