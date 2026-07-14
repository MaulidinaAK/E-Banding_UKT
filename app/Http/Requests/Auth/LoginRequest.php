<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
{
    $this->ensureIsNotRateLimited();

    $login = $this->input('login');

    $user = User::where('nim', $login)
                ->orWhere('nip', $login)
                ->first();

    if (!$user || !Hash::check($this->password, $user->password)) {

        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'login' => 'NIM/NIP atau password salah.',
        ]);
    }

    Auth::login($user, $this->boolean('remember'));

    RateLimiter::clear($this->throttleKey());
}

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        throw ValidationException::withMessages([
            'login' => 'Terlalu banyak percobaan login.',
        ]);
    }

    public function throttleKey(): string
    {
        return Str::lower($this->input('login')).'|'.$this->ip();
    }
}