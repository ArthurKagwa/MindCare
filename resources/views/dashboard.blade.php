<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Hello "). Auth::user()->name. __(" you are logged in!") }}
                </div>

            </div>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-carousel/>
        </div>
    </div>
    <div class="sm:grid grid-cols-6 gap-3">
        <div class="col-span-5">
            {{--    posts heading--}}

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
                <div class="p-6">
                    <h2 class="text-4xl font-semibold  text-center text-gray-800 dark:text-gray-200">Posts</h2>
                </div>
            </div>


            {{--    show first ten posts--}}

            @isset($posts)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">

                    @foreach($posts as $post)
                        <div class="post bg-white dark:bg-gray-800 overflow-hidden shadow-sm px-7 sm:rounded-lg my-5 ">
                            <div class="p-6">
                                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $post->title }}</h2>
                                <p class="text-gray-500 dark:text-gray-400">{{ $post->body }}</p>
                            </div>
                            <div class="flex pb-6">
                                <p class="like-count text-gray-900 text-2xl dark:text-gray-400 mx-2 cursor-pointer">{{ $post->like_count }}</p>
                                <form action="{{ route('posts.like', $post->id) }}" method="POST" class="like-form">
                                    @csrf
                                    <button type="submit" class="py-2 px-4 rounded focus:outline-none focus:shadow-outline"><i class="fa fa-thumbs-up"></i></button>
                                </form>
                                <form action="{{ route('posts.dislike', $post->id) }}" method="POST" class="dislike-form">
                                    @csrf
                                    <button type="submit" class="py-2 px-4 rounded focus:outline-none focus:shadow-outline"><i class="fa fa-thumbs-down"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endisset
        </div>
        <div class="">

        </div>
    </div>









</x-app-layout>
{{-- Add this script at the end of the file --}}
// resources/views/dashboard.blade.php

{{-- Add this script at the end of the file --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.like-form, .dislike-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const url = this.action;
                const likeCountElement = this.closest('.post').querySelector('.like-count');

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            likeCountElement.textContent = data.like_count;
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
