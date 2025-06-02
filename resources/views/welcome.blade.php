@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <!-- Hero Section -->
    <section class="flex flex-col lg:flex-row items-center gap-16 py-16 min-h-[80vh]">
        <div class="flex-1 max-w-2xl">
            <h1 class="text-4xl lg:text-6xl font-extrabold mb-6 bg-gradient-to-r from-purple-700 to-purple-900 bg-clip-text text-transparent animate-fade-in-up">
                Your Thoughts,<br>Organized
            </h1>
            <p class="text-lg text-gray-600 mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
                Capture, organize, and access your notes anytime, anywhere with a simple and intuitive interface designed to boost your productivity.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 animate-fade-in-up" style="animation-delay: 0.4s">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-gradient-to-r from-purple-700 to-purple-900 text-white rounded-xl font-semibold hover:shadow-xl hover:-translate-y-1 transition-all text-center text-lg">
                    Get Started
                </a>
                <a href="#features" class="px-8 py-4 border-2 border-purple-700 text-purple-700 rounded-xl font-semibold hover:bg-purple-50 transition-all text-center text-lg">
                    Learn More
                </a>
            </div>
        </div>
        <div class="flex-1 relative">
            <div class="relative w-full max-w-md mx-auto animate-float text-white">
                <div class="bg-white dark:bg-gray-800 w-72 h-[520px] rounded-[40px] shadow-2xl p-4 border-8 border-gray-800 dark:border-gray-700">
                    <div class="bg-gradient-to-br from-purple-50 to-blue-50 dark:from-gray-900 dark:to-gray-800 h-full rounded-[30px] p-6 overflow-y-auto">
                        <div class="space-y-4">
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 shadow-lg border-l-4 border-purple-700 animate-float">
                                <h3 class="font-semibold text-lg mb-2">Meeting Notes</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Discuss project timeline with design team. Follow up with developers about API integration.</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 shadow-lg border-l-4 border-green-500 animate-float" style="animation-delay: 1s">
                                <h3 class="font-semibold text-lg mb-2">Grocery List</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Milk, Eggs, Bread, Fruits, Vegetables, Coffee, Chicken, Pasta</p>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-5 shadow-lg border-l-4 border-purple-500 animate-float" style="animation-delay: 2s">
                                <h3 class="font-semibold text-lg mb-2">Book Recommendations</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Atomic Habits by James Clear, Deep Work by Cal Newport, The Psychology of Money</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl lg:text-5xl font-extrabold mb-6 bg-gradient-to-r from-purple-700 to-purple-900 bg-clip-text text-transparent animate-fade-in-up">
                Why Choose NotesApp?
            </h2>
            <p class="text-lg text-gray-600 animate-fade-in-up" style="animation-delay: 0.2s">
                Discover how NotesApp transforms the way you capture and organize your thoughts with powerful, intuitive features.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-xl hover:-translate-y-2 transition-all animate-fade-in-up">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900 dark:to-purple-800 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-bolt text-2xl text-purple-700 dark:text-purple-300"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Lightning Fast</h3>
                <p class="text-gray-600 dark:text-gray-300">Capture your thoughts instantly with our optimized interface. No lag, no waiting - just pure productivity.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-xl hover:-translate-y-2 transition-all animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900 dark:to-purple-800 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-sync-alt text-2xl text-purple-700 dark:text-purple-300"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Sync Across Devices</h3>
                <p class="text-gray-600 dark:text-gray-300">Access your notes seamlessly on your phone, tablet, or desktop. Everything stays in perfect harmony.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-3xl p-8 shadow-xl hover:-translate-y-2 transition-all animate-fade-in-up" style="animation-delay: 0.4s">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900 dark:to-purple-800 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-lock text-2xl text-purple-700 dark:text-purple-300"></i>
                </div>
                <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Bank-Level Security</h3>
                <p class="text-gray-600 dark:text-gray-300">Your notes are encrypted and stored securely with enterprise-grade protection to safeguard your privacy.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-purple-700 to-purple-900 rounded-3xl p-16 text-center mb-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-48 h-48 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2"></div>
        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-6 relative z-10">Start Organizing Your Thoughts Today</h2>
        <p class="text-lg text-white/90 max-w-2xl mx-auto mb-8 relative z-10">
            Join over 500,000 users who trust NotesApp to keep their ideas organized and accessible. Experience the difference today.
        </p>
        <a href="{{ route('register') }}" class="inline-block px-8 py-4 bg-white text-purple-700 rounded-xl font-bold text-lg hover:bg-gray-100 hover:-translate-y-1 hover:shadow-xl transition-all relative z-10">
            Sign Up Now - It's Free!
        </a>
    </section>
</div>

<!-- Footer -->
<footer class="text-center py-10 text-white border-t border-white/10 bg-gradient-to-r from-purple-700 to-purple-900">
    <p>&copy; 2025 NotesApp. All rights reserved. Made with ❤️ for organized minds.</p>
</footer>

<style>
    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

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

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out forwards;
    }
</style>
@endsection