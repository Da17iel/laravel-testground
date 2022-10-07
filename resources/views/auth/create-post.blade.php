<x-basic-layout>
    <x-slot name="title">
        Create your own posts
    </x-slot>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mr-96">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <h1>Create Your own Post</h1>

        <form method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
        @csrf

            <!-- Post Title -->
            <div class="mt-4">
                <x-label for="title" :value="__('Post Title')"/>

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required/>
            </div>

            <!-- Image Upload Button -->
            <div class="mt-4">
                <x-label for="image" :value="__('Post Image')"/>

                <x-input id="image" class="block mt-1 " type="file" name="image" :value="old('file')"/>
            </div>

            <!-- Body -->
            <div class="mt-4">
                <x-label for="body" :value="__('Post Body')"/>

                <textarea id="body" name="body" rows="8" cols="80"
                          class="block mt-1 w-full resize-none border-t border-gray-300 rounded-lg shadow"
                           required></textarea>
            </div>


            <?php
            if (!empty(Auth::user()->name)) {
                ?>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Post') }}
                </x-button>
            </div>
            <?php
            } else {
                ?>
            <p class="flex text-red-900 justify-end mt-3">You have to be logged in to create a post</p>
            <?php
            }
            ?>

        </form>

    </div>
</x-basic-layout>
