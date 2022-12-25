<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request){
        //   return $request->all();
          $validation = Validator::make($request->all(),[
              'name' => 'required',
              'email'=>'required|email|unique:users',
              'password'=>'required|min:4|confirmed',
          ]);

          if($validation->fails()){
            $response = [
                'status' =>400,
                'success' =>false,
                'message' =>$validation->errors()
            ];

            return response()->json($response,400);
          }

          //if no error message then make user

          $user = new User;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->save();
          $response = [
            'status' =>200,
            'success' =>true,
            'message' =>'User registered successfully',
            'data' =>[
                'token'=>$user->createToken('myApp')->plainTextToken,
                'name'=>$user->name,
                'email'=>$user->email

            ]
        ];
          return response()->json($response,200);
    }
}
