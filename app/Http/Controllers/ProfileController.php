<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

        $id = Auth::id();
        $profile = Profile::where('user_id', $id)->first();

        return view('page.profile.index', ['profile' => $profile]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'age' => 'required',
            'bio' => 'required',
            'photoProfile' => 'image|mimes:png,jpg,jpeg',
        ]);

        $photoProfileName = time().'.'.$request->photoProfile->extension();
        $request->photoProfile->move(public_path('images'), $photoProfileName);

        $profile = Profile::find($id);

        $profile->age = $request->age;
        $profile->bio = $request->bio;
        $profile->photoProfil = $photoProfileName;

        $profile->save();

        return redirect('/profile');
    }
}
