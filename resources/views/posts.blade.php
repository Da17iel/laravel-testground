<x-basic-layout>
    <x-slot name="title">All of the Posts</x-slot>

    <h1>Our Posts</h1>
    <p>Under us you can see all of the Posts
        <text>Our</text>
        users have made.
    </p>

    <div class="w-4/5 flex md:flex-wrap-reverse mt-6">
        @foreach ($post as $posts)
            <article class="posts min-w-20 max-w-xl">
                <a href="/post/{{ $posts->slug }}">
                    <div class="h-72">
                        <img src="{{ asset('storage/' . $posts->image) }}" alt="Landscape" class="h-full w-full z-0">
                    </div>
                </a>
                <div class="p-6">
                    <h2>
                        <a href="/post/{{ $posts->slug }}">{{ $posts->title }}</a>
                    </h2>
                    <p class="text-gray-500 my-2">Published
                        <time class="font-semibold">{{ $posts->created_at->diffForHumans() }}</time>
                        ago
                    </p>
                    <p>{{ Str::words($posts->body, 20, '...') }}</p>

                    <p class="italic my-1.5 text-sm">A Post by
                        <a href="/users/{{ $posts->author->username }}">{{ $posts->author->name }}</a>
                    </p>


                </div>
            </article>
        @endforeach
    </div>


</x-basic-layout>
