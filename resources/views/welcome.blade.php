<x-guest-layout>
    <div class="min-h-screen flex flex-col bg-gradient-to-br from-blue-100 to-blue-200 dark:bg-gradient-to-br dark:from-gray-800 dark:to-gray-900 px-6">
        
        <!-- Hero Section -->
        <div class="flex-grow flex flex-col justify-center items-center text-center py-12">
            <h1 class="text-4xl md:text-5xl font-bold text-blue-900 dark:text-white mb-4">
                MediConnect
            </h1>
            <p class="text-lg md:text-xl text-gray-800 dark:text-gray-200 mb-8 max-w-2xl">
                Fast and reliable emergency support. Connect with nearby medical facilities instantly.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                @auth
                    <a href="{{ route('emergency.create') }}"
                       class="inline-block bg-blue-700 hover:bg-blue-800 text-white font-semibold text-base py-3 px-8 rounded-lg shadow-lg transition-all !bg-blue-700 !text-white">
                        File a Medical Emergency
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-block bg-green-700 hover:bg-green-800 text-white font-semibold text-base py-3 px-8 rounded-lg shadow-lg transition-all !bg-green-700 !text-white">
                        Login to Report Emergency
                    </a>
                @endauth
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center py-4 text-gray-600 dark:text-gray-400 text-sm">
            &copy; {{ date('Y') }} MediConnect. All rights reserved.
        </footer>
    </div>
</x-guest-layout>
