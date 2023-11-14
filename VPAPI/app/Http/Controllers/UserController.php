<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{

    public function getAllUser(){
        $users = User::all();
        return UserResource::collection($users);
    }

    public function checkPassword(){
        $users = User::all();
        $check = [];

        foreach ($users as $user){
            array_push($check,
            Hash::check('Hayya1', $user->password));
        }

        return $check;
    }

    public function createUser(Request $request){
        try {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->age = $request->age;
            $user->save();

            return [
                'status' => Response::HTTP_OK,
                'message' => "Success",
                'data' => $user
            ];

        }catch(Exception $e){
            return [
                'status'=> Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'=> $e->getMessage(),
                'data'=> []
            ];
        }
    }

    public function updateUser(Request $request){
        if(!empty($request->email)){
            $user = User::where('email', $request->email)->first();
        }else{
            $user = User::where('id', $request->id)->first();
        }

        if(!empty($user)){
            try {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->phone = $request->phone;
                $user->age = $request->age;
                $user->save();
                return [
                    'status'=> Response::HTTP_OK,
                    'message'=> 'Edit Succes',
                    'data'=> $user
                ];
            }catch(Exception $e){
                return [
                    'status'=> Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message'=> $e->getMessage(),
                    'data'=> []
                ];
            }

        }

            return [
                'status'=> Response::HTTP_NOT_FOUND,
                'message'=> 'User Not Found',
                'data'=> []
            ];

    }

    public function deleteUser(Request $request){
        if(!empty($request->email)){
            $user = User::where('email', $request->email)->first();
        }else{
            $user = User::where('id', $request->id)->first();
        }

        if(!empty($user)){
            $user->delete();

            return [
                'status'=> Response::HTTP_OK,
                'message'=> 'Delete Success',
                'data'=> []
            ];
        }

        return [
            'status'=> Response::HTTP_NOT_FOUND,
            'message'=> 'User Not Found',
            'data'=> []
        ];
    }
}
