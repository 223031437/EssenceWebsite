<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'role' => ['required', 'in:customer,employee'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'The email or password is incorrect.',
            ])->withInput($request->only('email', 'role'));
        }

        if (($user->role ?: 'customer') !== $credentials['role']) {
            return back()->withErrors([
                'role' => $credentials['role'] === 'employee'
                    ? 'Access denied. This account is not registered as a salon employee.'
                    : 'This account is registered as an employee. Please select Employee to continue.',
            ])->withInput($request->only('email', 'role'));
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('home'))->with('success', 'Welcome back, '.$user->name.'.');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'role' => ['required', 'in:customer,employee'],
            'employee_code' => ['nullable', 'required_if:role,employee', 'string'],
        ]);

        $role = $validated['role'];

        if ($role === 'employee') {
            $configuredCode = (string) config('auth.employee_registration_code', '');

            if ($configuredCode === '' || !hash_equals($configuredCode, (string) $request->employee_code)) {
                throw ValidationException::withMessages([
                    'employee_code' => 'Employee registration denied. A valid salon employee verification code is required.',
                ]);
            }
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $role,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('home'))->with('success', 'Your '.$role.' account has been created.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out.');
    }
}
