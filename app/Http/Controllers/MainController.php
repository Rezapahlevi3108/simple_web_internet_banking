<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function home() {
        if (Auth::check()) {
            $user = User::where('id', Auth::user()->id)->with('UserDetail')->first();
            return view('pages.home', compact('user'));
        } else {
            return view('pages.home');
        }
    }

    function profile() {
        $user = User::where('id', Auth::user()->id)->with('UserDetail')->first();
        return view('pages.profile', compact('user'));
    }

    function editProfile(Request $request) {
        try {
            $user = User::where('id', Auth::user()->id)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            $userDetail = UserDetail::where('user_id', Auth::user()->id)->first();
            $userDetail->phone = $request->phone;
            $userDetail->address = $request->address;
            if($request->hasFile('file')){
                $userDetail ->profile_photo = 'photo'.time().'.'.$request->file->extension();
                $request->file->move(public_path('profile'), 'photo'.time().'.'.$request->file->extension());
            }
            $userDetail->save();
            
            return redirect()->route('profile')->with('success', 'Berhasil update profile!');
        } catch (Throwable $th) {
            return response()->json(['status' => $th->getMessage()]);
        }
    }
}
