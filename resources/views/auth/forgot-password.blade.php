{{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
</div>

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
            autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    </div>
</form> --}}


<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password • YourApp</title>
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
                <div
                    class="w-9 h-9 bg-yellow-500 rounded-2xl flex items-center justify-center text-white font-bold text-2xl shadow-inner">
                    Y</div>
                <span
                    class="logo-font text-3xl font-semibold tracking-tighter text-zinc-900 dark:text-white">YourApp</span>
            </div>
            <p class="text-zinc-500 dark:text-zinc-400 text-sm font-medium">Password reset</p>
        </div>

        <!-- Card -->
        <div class="glass border border-zinc-200 dark:border-zinc-800 rounded-3xl shadow-2xl shadow-black/5 p-10">

            <!-- Session Status -->
            @if (session('status'))
                <div
                    class="mb-6 bg-emerald-50 dark:bg-emerald-950 border border-emerald-200 dark:border-emerald-900 text-emerald-700 dark:text-emerald-300 text-sm font-medium rounded-2xl px-5 py-3 flex items-center gap-x-2">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <!-- Forgot Password Message -->
            <div class="mb-8 text-sm text-zinc-600 dark:text-zinc-400">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email"
                        class="block text-sm font-semibold text-zinc-900 dark:text-zinc-100 mb-1.5">Email
                        address</label>
                    <input id="email"
                        class="tail-input w-full px-5 py-3.5 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-2xl text-zinc-900 dark:text-zinc-100 focus:outline-none text-base"
                        type="email" name="email" :value="old('email')" required autofocus
                        placeholder="you@company.com">
                    @error('email')
                        <p class="mt-1.5 text-red-500 dark:text-red-400 text-xs flex items-center gap-x-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="flex items-center justify-end mt-6">
                    <button type="submit"
                        class="tail-button bg-gradient-to-r from-amber-400 to-yellow-500 hover:from-amber-500 hover:to-yellow-600 text-zinc-900 font-semibold py-4 px-8 rounded-2xl text-base shadow-inner shadow-yellow-400/30">
                        Email reset link
                    </button>
                </div>
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
