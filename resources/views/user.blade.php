<x-basic-layout>
    <x-slot name="title">
        {{ $name }}; Uses this Website
    </x-slot>

    <h1>{{ $name }}</h1>
    <p class="mb-8 leading-9">
        <img src="{{ asset('storage/ProfilePictures/' . $user->profilepicture) }}" alt="{{ $user->name }}'s Profile Picture"
             class="w-52 mb-6">
        This is the Data for the User <strong class="hover:underline">{{ $name }}</strong><br>
        This is {{ $name }}'s Username: {{ $user->username }}<br>
        This is the Users email: <a href="mailto:{{ $email }}">{{ $email }}</a><br>
        This is the Users ecrypted password: {{ $password }}<br>

        <?php if (!is_null(Auth::user()->name)) {
    ?> <a href="/edit-profile">Edit my Profile</a> <?php
        } ?>
    </p>

    <p><a href="/" class="hover:underline">Go Home</a></p>

</x-basic-layout>
