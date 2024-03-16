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
            'user_name' => 'required',
            'password'=>'required|min:8',
            'nid'=>'required|numeric|unique:users,nid|digits:14',
            'university'  => 'string',
            'phone'=>'required|numeric|digits:11',


        ]);
        if($validator->fails()){
            return response()->json([
                'validation_errors'=>$validator->messages(),
            ]);
        }else {
            $user->name=$request->name;
            $user->email=$request->email;
            $user->user_name=$request->user_name;
            $user->password=bcrypt($request->password);
            $user->nid=$request->nid;
            $user->university= $request->university;
            $user->phone=$request->phone;
            $user->nid=$request->nid;
            $user->user_name = $request->user_name;
            $user->save();
            return response()->json(['message'=>'User Register Successfully','user'=>$user,'token'=>$user->createToken($user->email.'_Token',['user'])->plainTextToken,201]);
        }
    }

    //user login API
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),402
            ]);
        }
        if (!Auth::attempt($request->only('user_name', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);

        }else {
            $user = User::where('user_name', $request->user_name)->firstOrFail();
            if ($user->user_role == 'admin') {
                $token = $user->createToken($user->user_name, ['admin'])->plainTextToken;
                return response()->json([
                    'message' => 'Login Successfully',
                    'user' => $user,
                    'token' => $token
                ],200);
            }elseif ($user->user_role == 'user') {
                $token = $user->createToken($user->user_name, ['user'])->plainTextToken;
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
        $request->user()->currentAccessToken()->delete();
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
            'nid'=>'required',
            'university' => 'string',
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
            'nid' => 'required',
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
