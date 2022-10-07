<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="http://{{ $_SERVER['SERVER_NAME'] }}:8000/favicon.png">

    <title>{{ $title }}</title>
</head>
<body class="pl-96">
<div class="absolute w-80 h-full top-0 left-0 pl-20 pt-20">
    <h3 class="text-2xl mb-4">Lists</h3>
    <ul>
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

<div class="absolute top-0 right-0 w-96 h-48 shadow p-6">
    <?php
    if (empty($_SESSION["username"])) {
        echo "<a href='/login'>Login</a>";
    } else {
    echo "You are logged in as: <br><p class='text-green-500 font-bold text-lg'>" . $_SESSION["username"] . "</p>";
    echo "<p class='mt-2'>Enjoy your stay</p>"
    ?>
    <form method="get">
        <input type="submit" name="signoff" value="signoff" class="bg-white hover:underline">
    </form>
    <?php
    }
    if (isset($_GET["signoff"])) {
        session_destroy();
    };
    ?>
</div>
{{ $slot }}
</body>
</html>
