@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-[#f4f4f4] dark:bg-[#1e1e1e] font-mono text-gray-900 dark:text-gray-100">
    <div class="w-[400px] bg-white dark:bg-[#2d2d2d] text-sm p-6 shadow-md border border-gray-300 dark:border-gray-700 rounded-none">

        <!-- Header ala Notepad -->
        <div class="bg-gray-200 dark:bg-[#3b3b3b] px-3 py-2 border-b border-gray-400 dark:border-gray-600 text-sm font-bold text-gray-700 dark:text-gray-200">
            Register.txt - Notepad
        </div>

        <div class="space-y-5 mt-4">
            <!-- Heading -->
            <div>
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Notepad Register</h2>
                <p class="text-xs text-gray-500 dark:text-gray-400">Isi data dulu, bro 😎</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-xs uppercase tracking-widest text-gray-700 dark:text-gray-300">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="mt-1 w-full rounded-none bg-transparent border border-gray-400 dark:border-gray-600 text-sm text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-0 focus:border-blue-500" />
                    @error('name')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs uppercase tracking-widest text-gray-700 dark:text-gray-300">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                        class="mt-1 w-full rounded-none bg-transparent border border-gray-400 dark:border-gray-600 text-sm text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-0 focus:border-blue-500" />
                    @error('email')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs uppercase tracking-widest text-gray-700 dark:text-gray-300">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="new-password"
                        class="mt-1 w-full rounded-none bg-transparent border border-gray-400 dark:border-gray-600 text-sm text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-0 focus:border-blue-500" />
                    @error('password')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-xs uppercase tracking-widest text-gray-700 dark:text-gray-300">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                        class="mt-1 w-full rounded-none bg-transparent border border-gray-400 dark:border-gray-600 text-sm text-gray-800 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-0 focus:border-blue-500" />
                    @error('password_confirmation')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded-none shadow-md focus:outline-none focus:ring-0">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
