<x-basic-layout>
    <x-slot name="title">
        {{ $name }}, {{ $age }} Years old
    </x-slot>
    <h1 class="mt-14 uppercase text-5xl text-yellow-500">
        <text class="hover:underline">Your</text>
        name is {{ $name }}</h1>
    <p class="my-8 leading-8">
        Name: {{ $name }}<br>
        Age: {{ $age }} Years old
    </p>
    <a href="/" class="hover:underline">Go Home</a>
</x-basic-layout>
