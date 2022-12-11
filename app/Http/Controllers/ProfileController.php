<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();

        if ($user->profile_img != null)
        {
            $image = $user->profile_img;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Auth::id() . '.' . 'png';
            $path = public_path() . '/images/' . $imageName;

            file_put_contents($path, base64_decode($image));

            $user->profile_img = $imageName;
        }

        return view('pages.profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate(
        [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255']
        ]);

        if ($request->profile_img != null)
        {
            $image = base64_encode(file_get_contents($request->profile_img));
            
            User::where('id', Auth::id())->update(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'profile_img' => $image
            ]);
        }
        else
        {
            User::where('id', Auth::id())->update(
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);
        }

        return redirect('/profile');
    }

    public function validator(Request $request)
    {
        return Validator::make($request,
        [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
    }
}
