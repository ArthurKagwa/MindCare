{{-- resources/views/components/sidebar.blade.php --}}
<div class="w-64 bg-white dark:bg-gray-800 h-screen shadow-md sticky top-0 hidden sm:block">
    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ __('Menu') }}</h2>
    </div>
    <ul class="mt-4">
        <li class="px-4 py-2 bg-amber-200 rounded m-2 hover:bg-amber-300 ">
            <a href="{{ route('dashboard') }}" class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="px-4 py-2">
            <a href="" class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400">
                {{ __('Events') }}
            </a>
        </li>
        @if(Auth::user()->role == 'admin')
            <li class="px-4 py-2">
                <a href="{{ route('posts.index') }}" class="text-gray-800 dark:text-gray-200 hover:text-indigo-600 dark:hover:text-indigo-400">
                    {{ __('Posts') }}
                </a>
            </li>
        @endif
    </ul>
</div>
