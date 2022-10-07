<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function ShowSingle(User $user)
    {
        return view('edit-profile', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'user' => $user,
            'posts' => Post::all()->where('user_id', $user->id)
        ]);
    }

    public function ShowAll()
    {
        return view('/all-users', [
            'user' => User::all(),
        ]);
    }
}
