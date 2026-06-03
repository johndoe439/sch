{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}



 <!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In • YourApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap');

        :root {
            --primary: 234 179 8;
        }

        .glass {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(20px);
        }

        .dark .glass {
            background: rgba(30, 30, 30, 0.75);
        }

        .tail-input {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tail-input:focus {
            box-shadow: 0 0 0 3px rgba(234, 179, 8, 0.15);
            border-color: rgb(234 179 8);
        }

        .tail-button {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tail-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgb(234 179 8 / 0.2);
        }

        .logo-font {
            font-family: 'Space Grotesk', sans-serif;
        }
    </style>
</head>
<body class="bg-zinc-50 dark:bg-zinc-950 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full">
        <!-- Header -->
        <div class="flex flex-col items-center mb-10">
            <div class="flex items-center gap-x-3 mb-2">
                <div class="w-9 h-9 bg-yellow-500 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-inner">Y</div>
                <span class="logo-font text-3xl font-semibold tracking-tighter text-zinc-900 dark:text-white">YourApp</span>
            </div>
            <p class="text-zinc-500 dark:text-zinc-400 text-sm font-medium">Welcome back</p>
        </div>

        <!-- Card -->
        <div class="glass border border-zinc-200 dark:border-zinc-800 rounded-3xl shadow-2xl shadow-black/5 p-10">

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 bg-emerald-50 dark:bg-emerald-950 border border-emerald-200 dark:border-emerald-900 text-emerald-700 dark:text-emerald-300 text-sm font-medium rounded-2xl px-5 py-3 flex items-center gap-x-2">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-7">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-zinc-900 dark:text-zinc-100 mb-1.5">Email address</label>
                    <input id="email"
                           class="tail-input w-full px-5 py-3.5 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-2xl text-zinc-900 dark:text-zinc-100 focus:outline-none text-base"
                           type="email"
                           name="email"
                           :value="old('email')"
                           required
                           autofocus
                           autocomplete="username"
                           placeholder="you@company.com">
                    @error('email')
                        <p class="mt-1.5 text-red-500 dark:text-red-400 text-xs flex items-center gap-x-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-sm font-semibold text-zinc-900 dark:text-zinc-100">Password</label>
                        <a href="{{ route('password.request') }}"
                           class="text-xs font-medium text-amber-600 dark:text-amber-500 hover:underline">
                            Forgot?
                        </a>
                    </div>
                    <input id="password"
                           class="tail-input w-full px-5 py-3.5 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-2xl text-zinc-900 dark:text-zinc-100 focus:outline-none text-base"
                           type="password"
                           name="password"
                           required
                           autocomplete="current-password"
                           placeholder="••••••••">
                    @error('password')
                        <p class="mt-1.5 text-red-500 dark:text-red-400 text-xs flex items-center gap-x-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <label class="flex items-center gap-x-2 cursor-pointer">
                    <input id="remember_me"
                           type="checkbox"
                           name="remember"
                           class="w-4 h-4 accent-amber-500 rounded border-zinc-300 dark:border-zinc-600">
                    <span class="text-sm text-zinc-600 dark:text-zinc-400 font-medium">Remember me</span>
                </label>

                <!-- Submit -->
                <button type="submit"
                        class="tail-button w-full bg-gradient-to-r from-amber-400 to-yellow-500 hover:from-amber-500 hover:to-yellow-600 text-zinc-900 font-semibold py-4 rounded-2xl text-base shadow-inner shadow-yellow-400/30">
                    Sign in
                </button>

                <!-- Forgot link -->
                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a href="{{ route('password.request') }}"
                           class="text-xs text-zinc-500 dark:text-zinc-400 hover:text-zinc-700 dark:hover:text-zinc-300 font-medium">
                            Having trouble? Get help
                        </a>
                    </div>
                @endif
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-xs text-zinc-400 dark:text-zinc-600">
                © 2026 YourApp. All rights reserved.
            </p>
        </div>
    </div>

    <script>
        // Tailwind script already loaded via CDN
        // Dark mode is automatically handled by Tailwind
    </script>
</body>
</html>
