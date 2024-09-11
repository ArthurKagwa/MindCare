{{-- resources/views/manage-posts.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Posts') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6">
            <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Post</a>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">

            <div class="md:grid grid-cols-3 gap-2">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Post Titles</h2>
                        <ul>
                            @foreach($posts as $index => $post)
                                <li class="text-gray-500 dark:text-gray-400 bg-amber-300 hover:bg-amber-500 shadow-md my-2 p-1 rounded">
                                    <a href="{{ route('posts.edit', $post->id) }}">Post {{ $index + 1 }}: {{ $post->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="bg-white col-span-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Posts</h2>

                            @foreach($posts as $post)
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6">
                                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $post->title }}</h2>
                                        <p class="text-gray-500 dark:text-gray-400">{{ $post->body }}</p>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
