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
            'password'=>'required|min:8',
            'phone'=>'required|numeric|digits:11',
            'user_nid'=>'required|numeric|unique:users,user_nid|digits:14',
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
            return response()->json(['message'=>'User Register Successfully','user'=>$user,'token'=>$user->createToken($user->email.'_Token',['user'])->plainTextToken,201]);
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
            $user = User::where('email', $request->email)->firstOrFail();
            if ($user->user_role == 'admin') {
                $token = $user->createToken($user->email, ['admin'])->plainTextToken;
                return response()->json([
                    'message' => 'Login Successfully',
                    'user' => $user,
                    'token' => $token
                ],200);
            }elseif ($user->user_role == 'user') {
                $token = $user->createToken($user->email, ['user'])->plainTextToken;
                return response()->json([
                    'message' => 'Login Successfully',
                    'user' => $user,
                    'token' => $token
                ],200);
            }
        }
    }
    //User Logout
    public function logout(Request $request){
        $user=User::where('email',$request->email)->first();
        $user->tokens()->delete();
        return response()->json(['message'=>'Logout Successfully']);
    }

    //User Index
    public function index(){
        $user=User::all();
        return response()->json($user);
    }

    //User show
    public function show($id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    //User update
    public function update(Request $request, $id){
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
            $user=User::findOrFail($id);
            $user->update($request->all());
            return response()->json($user);
        }
    }

    //User delete
    public function destroy($id){
        $user=User::findOrFail($id);
        $user->delete();
        return response()->json(['message'=>'User Deleted Successfully']);
    }

    //admin create
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
            'user_nid' => 'required',
            'user_role' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        } else {
            $user = User::create($request->all());
            return response()->json(['message' => 'User Created Successfully', 'user' => $user, 'token' => $user->createToken($user->email.'_Token',['admin'])->plainTextToken], 201);
        }
    }

    //admin index
    public function adminIndex()
    {
        $user = User::where('user_role', 'admin')->get();
        return response()->json($user);
    }



}
