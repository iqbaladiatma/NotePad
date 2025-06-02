@extends('layouts.app')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-50 via-white to-purple-100 font-poppins">
    <div class="w-full max-w-md p-8">
        <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-3xl p-8 animate-fade-in-up">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-purple-700 to-purple-900 bg-clip-text text-transparent">Welcome Back</h2>
                <p class="mt-2 text-gray-600">Sign in to your account to continue</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
            <div class="mb-6 p-4 text-sm text-green-700 bg-green-100 rounded-xl animate-fade-in-down">
                {{ session('status') }}
            </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-purple-800 mb-2">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="w-full px-4 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200"
                        placeholder="Enter your email" />
                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-purple-800 mb-2">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        class="w-full px-4 py-3 border border-purple-200 rounded-xl shadow-sm focus:border-purple-500 focus:ring-purple-500 transition-all duration-200"
                        placeholder="Enter your password" />
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember"
                            class="h-4 w-4 text-purple-600 border-purple-300 rounded focus:ring-purple-500">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm font-medium text-purple-700 hover:text-purple-800 transition-colors">
                        Forgot password?
                    </a>
                    @endif
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full px-6 py-3 text-white font-semibold bg-gradient-to-r from-purple-700 to-purple-900 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">
                        Sign In
                    </button>
                </div>

                <!-- Register Link -->
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="font-medium text-purple-700 hover:text-purple-800 transition-colors">
                            Sign up
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in-up {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fade-in-down {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out forwards;
    }

    .animate-fade-in-down {
        animation: fade-in-down 0.6s ease-out forwards;
    }
</style>
@endsection