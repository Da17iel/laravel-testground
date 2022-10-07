<x-basic-layout>
    <x-slot name="title">
        All of our Users
    </x-slot>


    <h1>
        <text class="hover:underline">Everybody</text>
        that uses this Website
    </h1>
    <p class="paragraph">The password password encryption method is for every User the same: <br>
        <strong id="password-text"><a href="https://de.wikipedia.org/wiki/Bcrypt" target="_blank">Bcrypt encryption</a></strong>
    </p>
    <div class="my-12 -ml-4">
        @foreach ($user as $user)
            <article class="users flex">
                    <h2 class="hover:underline inline justify-self-end">
                        <a href="/users/{{ $user->username }}" title="{{ $user->email }}" class="flex flex-row">
                            <img src="{{ asset('storage/ProfilePictures/' . $user->profilepicture ) }}"
                            alt="{{ $user->name }}'s Profile Picture" class="w-8 h-8 mr-2 justify-self-start rounded-3xl text-lg">
                            {{ $user->name }}
                        </a>
                    </h2>

                <p class="inline">Email: {{ $user->email }}</p><br>
                <p class="inline">Gender: {{ $user->gender }}</p><br>
            </article>

        @endforeach
    </div>

    <a href="/"><p>Go Home</p></a>
    <br><br>


</x-basic-layout>
