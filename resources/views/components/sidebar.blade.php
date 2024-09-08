<div class="w-64 bg-white dark:bg-gray-800 h-screen shadow-md">
    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Sidebar</h2>
    </div>
    <ul class="mt-4">
        <li class="px-4 py-2">
            <a href="{{ route('dashboard') }}" class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="px-4 py-2">
{{--            <a href="{{ route('events') }}" class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400">--}}
{{--                {{ __('Events') }}--}}
{{--            </a>--}}
        </li>
        <!-- Add more links as needed -->
    </ul>
</div>
