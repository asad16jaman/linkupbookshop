<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //

    public function index(){

        return view('user.profile');
    }

    public function storeProfile(Request $request){

        $request->validate([
            'fullname' => "nullable|min:3",
            'email' => 'nullable|email',
        ]);

        $data = $request->only(['fullname','email','phone','address']);
        User::where('id',Auth::user()->id)->update($data);
        return redirect()->back()->with('success','Successfully Updated Profile Info..');
    }

    public function wishlist(){

        $data = Wishlist::with('book')->where('user_id',Auth::user()->id)->get();
        return view('user.wishlist',compact(['data']));
    }

    public function changePassword(){

        return view('user.changepasswore');
    }

    function update_password(Request $request){

        $request->validate([
            "c_password" => "required|current_password",
            "password" => "required|min:7|confirmed"
        ]);
       
        $user= Auth::user();
        User::where('id',$user->id)->update(['password'=>Hash::make($request->input('password'))]);
        return redirect()->back()->with('success',"Successfully Updated Your password");



    }





}
