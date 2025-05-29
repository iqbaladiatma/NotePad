<nav class="bg-purple-800 p-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        @auth
        <a href="{{ route('dashboard') }}" class="text-white text-lg font-semibold">NotePad</a>
        @endauth
        <a href="{{ url('/') }}" class="text-white text-lg font-semibold">NotePad</a>

        <div class="flex items-center space-x-4">
            <!-- Navigation Links -->
            <div class="flex space-x-4">
                @auth
                <a href="{{ route('dashboard') }}" class="text-white hover:text-purple-200">Dashboard</a>
                @endauth

            </div>

            <!-- User Dropdown / Auth Links -->
            @auth
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center text-white hover:text-purple-200">
                    <span class="mr-2">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open"
                    @click.away="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-100">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-purple-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
            @endauth

            @guest
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="text-white hover:text-purple-200">Login</a>
                <a href="{{ route('register') }}" class="text-white hover:text-purple-200">Register</a>
            </div>
            @endguest

        </div>
    </div>
</nav>