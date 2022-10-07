<?php session_start(); ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="http://{{ $_SERVER['SERVER_NAME'] }}:8000/favicon.png">
    <title>{{ $title }} - Daniel's Page</title>
</head>
<body class="bg-gray-50">

<div class="fixed shadow w-80 h-full top-0 left-0 pl-20 pt-40 bg-white">
    <h3 class="text-2xl mb-4">Navbar</h3>
    <ul>
        <?php if (!empty(Auth::user()->username)) { echo "<li><a href='/users/" . Auth::user()->username . "'>My Profile</a></li>";  } ?>
        <li><a href="/all-users">Show all users</a></li>
        <li><a href="/posts">Show all Posts</a></li>
        <li><a href="/create-post">Create your own Post</a></li>
        <li><a href="/login">Login!</a></li>
        <li><a href="/register">Register!</a></li>
        <li><a href="http://{{ $_SERVER['SERVER_NAME'] }}:8000/users/{{ App\Models\User::find(1)->username }}">Get the
                first user of the List</a></li>
        <li><a href="http://{{ $_SERVER['SERVER_NAME'] }}:8000/views/daniel-{{ rand(12,45) }}">Get a random Link</a>
        </li>
        <li><a href="/hi">Try this Out!</a></li>
        <li><a href="/laravel">Tailwind CSS Practise</a></li>
        <li><a href="/">Home</a></li>
    </ul>
</div>
<div class="ml-96 mt-20">
    {{ $slot }}
</div>

<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function openButton() {
        document.getElementById("DropdownContent").classList.toggle("showContent");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.hoverParent')) {
            var dropdowns = document.getElementsByClassName("hoverChildContent");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('showContent')) {
                    openDropdown.classList.remove('showContent');
                }
            }
        }
    }
</script>

</body>
</html>
