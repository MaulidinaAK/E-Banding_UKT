<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- NIM / NIP -->
        <div>
            <x-input-label
                for="login"
                value="NIM / NIP"
                class="mb-2 fw-semibold text-slate-700" />

            <x-text-input
                id="login"
                class="block w-full rounded-4 border-0"
                style="
                    background:#F8FAFC;
                    padding:15px 18px;
                    box-shadow:0 0 0 1px #E2E8F0;
                "
                type="text"
                name="login"
                :value="old('login')"
                placeholder="Masukkan NIM atau NIP"
                required
                autofocus
                autocomplete="username" />

            <x-input-error
                :messages="$errors->get('login')"
                class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label
                for="password"
                value="Password"
                class="mb-2 fw-semibold" />

            <x-text-input
                id="password"
                class="block w-full rounded-4 border-0"
                style="
                    background:#F8FAFC;
                    padding:15px 18px;
                    box-shadow:0 0 0 1px #E2E8F0;
                "
                type="password"
                name="password"
                required
                autocomplete="current-password" />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 mb-4">
            <label class="inline-flex items-center">
                <input
                    type="checkbox"
                    name="remember"
                    class="rounded">

                <span class="ms-2 text-sm text-gray-600">
                    Remember me
                </span>
            </label>
        </div>

        <div class="mt-4">

            <button
                type="submit"
                style="
                    width:100%;
                    padding:14px;
                    border:none;
                    border-radius:14px;
                    background:linear-gradient(135deg,#2563EB,#4F8DFD);
                    color:white;
                    font-weight:600;
                    font-size:16px;
                    box-shadow:0 10px 25px rgba(37,99,235,.25);
                    transition:.2s;
                ">
                Login
            </button>

           

            @if (Route::has('password.request'))
                <div class="text-center mt-3">
                    <a
                        class="text-sm text-blue-600 hover:underline"
                        href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                </div>
            @endif

             <div class="mt-4 text-center">
    <span class="text-sm text-gray-600">
        Belum memiliki akun?
    </span>

    <a href="{{ route('register') }}"
       class="text-sm font-semibold text-blue-600 hover:text-blue-800 hover:underline">
        Daftar di sini
    </a>
</div>

        </div>

    </form>
</x-guest-layout>