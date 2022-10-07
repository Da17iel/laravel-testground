<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'ProfilePicture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (!empty($request->ProfilePicture)) {
            $imagename = Carbon::now()->getTimestamp() . "_" . $request->ProfilePicture->getClientOriginalName();
            $request->ProfilePicture->storeAs('/public/ProfilePictures', $imagename);
        } else {
            $imagename = Arr::random(
                array(
                    'sample-profile-picture-1.png',
                    'sample-profile-picture-2.png',
                    'sample-profile-picture-3.png',
                    'sample-profile-picture-4.png'
                )
            );
        }


        $user = User::create([
            'ProfilePicture' => $imagename,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'status' => "I am new here!",
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
