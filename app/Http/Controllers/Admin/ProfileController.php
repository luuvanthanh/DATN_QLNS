<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
      $userId = Auth::user()->id;
      $user = User::findOrFail($userId);
      return view('admin.profile.index', compact('user'));
    }
    
    public function updateprofile(Request $request){

    }

    public function changePassword(Request $request)
    {
      if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
      }
      if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
        //Current password and new password are same
        return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
      }
      $validatedData = $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:5|confirmed',
      ]);
      $user = Auth::user()->id;
      // $user = User::findOrFail($userId);
      $user->password = bcrypt($request->get('new_password'));
      $user->save();

      return redirect()->back()->with("success","Password changed successfully !");
      
    }
}
