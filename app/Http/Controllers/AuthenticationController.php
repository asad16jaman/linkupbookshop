<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Log;

class AuthenticationController extends Controller
{
    //

    public function register(Request $request){
        $validat = Validator::make($request->all(),[
            'username' => [
                        'required',
                        'string',
                        'max:255',
                        'unique:users,username'
                    ],
            'password' => [
                        'required',
                        'string',
                        // 'min:8',          
                        // 'confirmed'
                    ]
        ]);
        if($validat->fails()){
            return response()->json([
                'status' => false,
                'error' => $validat->errors()
            ]);
        }

        $userInput = $request->only('username','password');
        $newUser = User::create($userInput);

        session()->flash('success', 'Successfully Created User');

        return response()->json([
            'status' => true,
            'message' => 'Successfully Created User',
            'user' => $newUser
        ]);
    }

    public function authenticate(Request $request){

        $credentials = $request->only('username','password');

        // return response()->json([$credentials]);
        
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
           return response()->json([
            'status'=> true
           ]);
        }
        else {

            return response()->json([
                'status' => false,
            ]);

        }

    }



}
