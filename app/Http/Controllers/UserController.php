<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //Get the list of users 
        return UserResource::collection(User::with('role')->get());
    }

    public function store(UserStoreRequest $request)
    {
        //To store a user and validate using UserStoreRequest
        $user = new User();
        $user->role_id = $request->role_id;
        $user->full_name = $request->full_name;
        $user->email_address = $request->email_address;
        $user->password = Hash::make($request->password);
        $user->password_confirmation = Hash::make($request->password_confirmation);
        $user->save();
        return response()->json(
            [
                'message' => 'User stored'
            ]
        );
    }

    public function show(User $user)
    {
        //To show an individual user based on id passed
        return new UserResource($user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        //To update a user and validate using UserUpdateRequest
        $user->role_id = $request->role_id;
        $user->full_name = $request->full_name;
        $user->email_address = $request->email_address;
        $user->password = bcrypt($request->password);
        $user->password_confirmation = bcrypt($request->password_confirmation);
        $user->update();
        return response()->json(
            [
                'message' => 'User updated'
            ],
        );
    }

    public function destroy(User $user)
    {
        //To delete a user based on id passed
        $user->delete();
        return response()->json(
            [
                'message' => 'User deleted'
            ]
        );
    }

    public function login(Request $request)
    {
        //Attempt to enter email+password 
        if (auth()->attempt(['email_address' => $request->email_address, 'password' => $request->password])) {
            $user = auth()->user();
            //Show the data of the user after successful login
            return new UserResource($user);
        } else {
            return response()->json(
                [
                    'message' => 'User not found'
                ]
            );
        }
    }
}
