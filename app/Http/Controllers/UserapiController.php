<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;


class UserapiController extends Controller
{
    public function Users($id=null)
    {
        if ($id=='') {
            $users = User::get();
            return response()->json([
                'status'  => 200,
                'users'  => $users,
            ]);
        }
        else{
            $users = User::find($id);
              return response()->json([
                'status'  => 200,
                'users'  => $users,
            ]);
        }
    }

    public function UsersAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $data =  $request->all();

            $validator = Validator::make($data,[
                'name'      => 'required|min:4|string',
                'email'     => 'required|email|unique:users',
                'password'  => 'required|min:6',
            ]);

            if ($validator->fails()) {
                 return response()->json([
                'status'  => 422,
                'errors'  => $validator->errors()
            ]);

            }
            

            $user = new User();
            $user->name     = $data['name'];
            $user->email    = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();

            return response()->json([
                'status'  => 201,
                'message'  => 'User Create Succfully'
            ]);
        }
    }

    public function UserMultipleAdd(Request $request)
    {
        if($request->isMethod('post')){

            $data =  $request->all();

            $validator = Validator::make($data,[
                'users.*.name'      => 'required|string',
                'users.*.email'     => 'required|email|unique:users',
                'users.*.password'  => 'required|string|min:6',
            ]);

            if ($validator->fails()) {

             return response()->json([
                'status'  => 422,
                'errors'  => $validator->errors()
              ]);
            }

           foreach($data['users'] as $adduser){
            $user = new User();
            $user->name     = $adduser['name'];
            $user->email    = $adduser['email'];
            $user->password = bcrypt($adduser['password']);
            $user->save();
           }

            return response()->json([
                'status'  => 201,
                'message'  => 'User Create Succfully'
            ]);

        }
    }
}