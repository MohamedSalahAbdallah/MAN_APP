<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //user register API
    public function register(Request $request){
        $user=new User;
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'phone'=>'required',
            'user_nid'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'validation_errors'=>$validator->messages(),
            ]);
        }else {
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->phone=$request->phone;
            $user->user_nid=$request->user_nid;
            $user->save();
            return response()->json(['message'=>'User Register Successfully','user'=>$user,'token'=>$user->createToken($user->email.'_Token')->plainTextToken,201]);
        }
    }

    //user login API
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);

        }else {
            $user = User::where('email', $request->emaile)->firstOrFail();
            return response()->json([
                'user' => $user,
                'token' => $user->createToken($user->email.'_Token')->plainTextToken
            ], 200);
        }
    }
}
