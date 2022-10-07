<x-basic-layout>
    <x-slot name="title">
        A Post by {{ $post->author->name }}
    </x-slot>
    <h1>{{ $post->title }}</h1>
    Written By
    <div class="hoverChild" onmouseover="openButton()">
        <i class="hoverParent">
            <a href="/users/{{ $post->author->username }}">{{ $post->author->name }}</a>
        </i>
        <div id="DropdownContent" class="hoverChildContent w-96">
            <img src="{{ asset('storage/ProfilePictures/' . $post->author->profilepicture ) }}" alt="ProfilePicture"
                 class="mb-3 inline-block" width="30%" height="auto">
            <div class="inline-block">
                <p>{{ $post->author->name }}</p><br>
                <i>{{ $post->author->status }}</i>
            </div>
        </div>
    </div>
    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="max-h-60 my-6 shadow-lg">

    <!-- Post Body -->
    <div class="pr-96 max-w-7xl">
        <p class="mt-12 whitespace-pre-wrap">{!! $post->body !!}</p>
    </div>
    <hr class="my-6">
    <!-- Comment Box -->
    <?php if (Auth::user()) { ?>
    <form action="/store-comment" method="post">
        @csrf
        <label for="comment" class="font-semibold">Leave a comment to this Post</label><br>
        <textarea name="body" id="body" rows="8" cols="80" placeholder="Write a comment!!!!"
                  class="resize-y mt-2 min-h-10 max-h-96 shadow rounded" required></textarea><br>
        <input type="hidden" name="postID" id="postID" value="{{ $post->id }}">
        <input type="hidden" name="url" id="url" value="/post/{{ $post->slug }}">
        <input type="submit" name="comment" value="Comment"
               class="p-2 bg-gray-900 text-white rounded  cursor-pointer hover:bg-gray-800">
    </form>
    <?php } else { ?>
    <!-- Not logged in -->
    <i class="font-bold">You have to be logged in to write a comment</i>
    <?php } ?>
    <hr class="my-6">
    <label class="font-semibold">Comments</label>

    <!-- Comments -->
    @foreach ($post->comments as $comment)

        <!-- Head Comment -->
        <?php if ($comment->post_id > 0) { ?>
        <div class="pr-40 p-2 m-2 host-comment">
            <strong class="text-sm mb-1.5 italic">
                <a href="{{ '/users/' . $user->find($comment->user_id)->username }}">
                    {{ $user->find($comment->user_id)->name }}
                </a>
            </strong><br>
            <span class="whitespace-pre-wrap">{{ $comment->body }}</span>

            <!-- Only reply when logged in -->
            <?php if (Auth::user()) {?>
            <form action="/store-reply" method="post" class="hide-replyBox mt-2">
                @csrf
                <input name="reply" type="text" placeholder="Write your reply in here" class="w-72">
                <input name="host-id" type="hidden" value="{{ $comment->id }}">
                <input type="hidden" name="url" id="url" value="/post/{{ $post->slug }}">
                <input type="submit" class="p-2 border-2 border-black bg-black text-white rounded">
            </form>
            <?php } ?>
        </div>
        ---
        <?php } ?>
        <div class="ml-12 my-2">

            <!-- Follow up comments -->
            @foreach ($comment->comment as $response)
                <strong class="text-sm mb-1.5 italic">
                    <a href="/users/{{ $response->author->username }}">{{ $response->author->name }}</a>
                </strong><br>
                <span class="whitespace-pre-wrap">{{ $response->body }}</span>
                <p>----</p>
            @endforeach

        </div>
    @endforeach
    <p class="mt-12 pb-12"><a href="/posts">Go Back</a></p>

    <script>
        function replyBox() {
            this.getElementById()
        }
    </script>
</x-basic-layout>
