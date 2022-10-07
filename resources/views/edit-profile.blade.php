<x-basic-layout>
    <x-slot name="title">
        {{ $user->name }}'s Profile
    </x-slot>
    <div class="flex">
        <div>
            <div id="ProfileInformation"
                 class="shadow-lg rounded-2xl p-12 border-2 border-gray-200 grid justify-items-center text-center bg-white w-72">
                <img src="{{ asset('storage/ProfilePictures/' . $user->profilepicture) }}"
                     alt="{{ $user->name }}'s Profile Picture"
                     class="h-32 w-auto rounded-2xl">
                <p class="mt-6 font-bold text-xl">{{ $user->name }}</p>
                <p class="text-sm mt-1">Joined {{$user->created_at->diffForHumans()}}</p>
                <p class="mt-2 ">{{ Str::words($user->status, 15, " ...") }}</p>
                <?php
                if (!empty(Auth::user()->name)) {
                if (Auth::user()->name == $user->name) {?>
                <form action="/edit-menu" enctype="multipart/form-data">
                    @csrf
                    <x-button class="mt-6">
                        {{ __('Edit Profile') }}
                    </x-button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                <?php }
                }?>
            </div>
            <div id="ProfileEditing"
                 class="shadow-lg rounded-2xl p-12 border-2 border-gray-200 grid justify-items-center mt-12 bg-white max-w-md overflow-auto">
                <p>{{$user->email}}</p>
                <p>Gender: {{ $user->gender }}</p>
                <?php
                if (!empty(Auth::user()->name)) {
                if (Auth::user()->name == $user->name) {?>
                <p><a href="/forgot-password">Change Password</a></p>
                <?php }
                }?>
            </div>
        </div>
        <div class="ml-12">
            @foreach($posts as $post)
                <div class="PersonalPost margin-top">
                    <a href="{{ asset('post/' . $post->slug) }}">
                        <img src="{{ asset('storage/' . $post->image ) }}" alt="{{ $post->title }}"
                             class="w-full z-index-0 rounded-t-lg">
                    </a>
                    <div class="p-4">
                        <h2><a href="{{ asset('post/' . $post->slug) }}">{{ $post->title }}</a></h2>
                        <p>{{ Str::words($post->body, 20, '...')  }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-basic-layout>
