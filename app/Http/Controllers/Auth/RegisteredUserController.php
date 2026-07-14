<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
  public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'nim' => ['required', 'string', 'unique:users,nim'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $data = [
        'name' => $request->name,
        'nim' => $request->nim,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => 1,
    ];

    $user = new User($data);

    $user->save();   // <-- INI YANG KEMARIN HILANG

    event(new Registered($user));

    Auth::login($user);

    return redirect()->route('mahasiswa.dashboard');
}
}
