<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function register(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|confirmed|min:5',
        ]);
        // return $validator;
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return response()->json([
            'massage'=>'user created successfully',
            'user'=>$user,
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|string|email|exists:users',
            'password'=>'required|string|min:5',
        ]);

        if(!$token = auth()->attempt([
            'email'=>$request->email,
        'password'=>$request->password,
        ])){
            return response()->json([
                'massage'=>'Wrong Credentials',
            ]);
        }else{
            return $this->sendToken($token);
        }

    }

    protected function sendToken($token){
        return response()->json([
            'access_token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=> 3600
        ]);
    }

    public function profile(){
        // $req = new Request();
        return response()->json([
            'user'=>auth()->user()
        ]);
    }

    public function refresh(){
        return $this->sendToken(auth()->refresh());

    }

    public function logout(){
        auth()->logout();
        return response()->json([
            'message'=>'user LoggedOut successfully'
        ]);
    }

    function resetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'newpass' => 'required|min:5|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=>$validator->errors()
            ]);
        }
        $id = auth()->user()->id;
        // return $id;
        $user = User::findOrFail($id);
        $user->update([
            'password'=>Hash::make($request->newpass)
        ]);
        return response()->json([
            'massage'=>'password reseted successfully'
        ]);


    }

}
