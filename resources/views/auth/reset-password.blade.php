{{-- <form method="POST" action="{{ route('password.store') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
            autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
            required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Reset Password') }}
        </x-primary-button>
    </div>
</form> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', system-ui, sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        .input-focus {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            border-color: rgb(99 102 241);
        }

        .btn-hover {
            transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
        }

        .btn-hover:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgb(99 102 241 / 0.3);
        }
    </style>
</head>

<body
    class="min-h-screen bg-gradient-to-br from-zinc-950 via-zinc-900 to-indigo-950 flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="glass border border-white/10 rounded-3xl shadow-2xl shadow-black/40 p-10">
            <!-- Logo/Title -->
            <div class="text-center mb-10">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-2xl shadow-lg mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <h1 class="text-4xl font-semibold tracking-tighter text-white">Reset Password</h1>
                <p class="text-zinc-400 mt-2 text-sm">Enter your new password below</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-white/90 mb-1.5">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}"
                        required autofocus autocomplete="username"
                        class="input-focus block w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-zinc-500 focus:outline-none text-[15px]">
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-white/90 mb-1.5">New Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password"
                        class="input-focus block w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-zinc-500 focus:outline-none text-[15px]">
                </div>

                <!-- Confirm Password -->
                <div class="mb-8">
                    <label for="password_confirmation" class="block text-sm font-medium text-white/90 mb-1.5">Confirm
                        New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        autocomplete="new-password"
                        class="input-focus block w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-zinc-500 focus:outline-none text-[15px]">
                </div>

                <!-- Button -->
                <div>
                    <button type="submit"
                        class="btn-hover w-full bg-gradient-to-r from-indigo-500 to-violet-600 hover:from-indigo-600 hover:to-violet-700 text-white font-medium text-lg py-4 rounded-2xl transition-all flex items-center justify-center gap-3 shadow-lg shadow-indigo-500/30">
                        <span>Reset Password</span>
                    </button>
                </div>
            </form>

            <!-- Footer link (optional - not in original, added for completeness) -->
            <div class="mt-8 text-center">
                <a href="{{ route('login') }}" class="text-xs text-white/60 hover:text-white/90 transition-colors">
                    Back to login
                </a>
            </div>
        </div>
    </div>

    <script>
        // Tailwind script already loaded via CDN
    </script>
</body>

</html>
