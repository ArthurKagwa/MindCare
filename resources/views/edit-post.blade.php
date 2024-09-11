<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6">
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <label for="body" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Body</label>
                    <textarea name="body" id="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">{{ $post->body }}</textarea>
                </div>
                <div class="flex items center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Post</button>
                    <a href="{{ route('dashboard') }}" class="bg-red-500 hover:bg-red-700 text-red font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>
{{--                    delete--}}
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red hover:bg-red-700 text-red font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete Post</button>
                    </form>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
