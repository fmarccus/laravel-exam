<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Models\Role;
use App\Models\User;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index(Request $request)
    {
        //Get the list of roles 
        return RoleResource::collection(Role::with('user')->get());
    }

    public function create()
    {
        //
    }

    public function store(RoleStoreRequest $request)
    {
        //To store a user and validate using RoleStoreRequest
        Role::create($request->validated());
        return response()->json(
            [
                'message' => 'Role stored'
            ]
        );
    }


    public function show(Role $role)
    {
        //To show an individual role based on id passed
        return new RoleResource($role);
    }


    public function edit(Role $role)
    {
    }


    public function update(RoleStoreRequest $request, Role $role)
    {
        //To update a user and validate using RoleStoreRequest
        $role->update($request->validated());
        return response()->json(
            [
                'message' => 'Role updated'
            ]
        );
    }


    public function destroy(Role $role)
    {
        //To delete a role based on id passed
        $role->delete();
        return response()->json(
            [
                'message' => 'Role deleted'
            ]
        );
    }
}

//get the user + role
// $user = User::where('id', 3)->with('role')->get();
// return $user;
// $userRole = Role::with('user:name,email,role_id')->get();
// return $userRole;
