<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{

    public function OpenProfileEdit()
    {
        return view('edit-profile', [
            'user' => Auth::user(),
            'posts' => Post::all()->where('user_id', Auth::user()->id)
        ]);
    }

    public function OpenEditMenu()
    {
        if (empty(Auth::user())) {
            return view('auth.login');
        }
        return view('edit-menu', [
            'userdata' => Auth::user(),
        ]);
    }

    public function SaveEditMenu(Request $request) {
        $request->validate([
            'ProfilePicture' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'gender' => 'required|string',
        ]);

        if (!empty($request->ProfilePicture)) {
            $imageName = Carbon::now()->getTimestamp() . "_" . $request->ProfilePicture->getClientOriginalName();
            $request->ProfilePicture->storeAs('/public/ProfilePictures', $imageName);
        } else {
            $user = User::find(Auth::user()->id);
            $imageName = $user->profilepicture;
        }
        $user = User::find(Auth::user()->id);
        $user->profilepicture = $imageName;
        $user->name = request('name');
        $user->status = request('status');
        $user->gender = request('gender');
        $user->save();

        return redirect('/users/' . $user->username);
    }


}
