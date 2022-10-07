<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <p>Check out the Links below!</p><br><br>
                    <ul>
                        <li><a href="/all-users">Show all users</a></li>
                        <li><a href="/posts">Show all Posts</a></li>
                        <li><a href="/create-post">Create your own Post</a></li>
                        <li><a href="/login">Login!</a></li>
                        <li><a href="/register">Register!</a></li>
                        <li>
                            <a href="http://{{ $_SERVER['SERVER_NAME'] }}:8000/users/{{ App\Models\User::find(1)->username }}">Get
                                the first user of the List</a></li>
                        <li><a href="http://{{ $_SERVER['SERVER_NAME'] }}:8000/views/daniel-{{ rand(12,45) }}">Get a
                                random Link</a></li>
                        <li><a href="/hi">Try this Out!</a></li>
                        <li><a href="/laravel">Tailwind CSS Practise</a></li>
                        <li><a href="/">Home</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
