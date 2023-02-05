<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Append the sanctum/csrf-cookie for the session
Route::group(['prefix' => 'sanctum/csrf-cookie'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('roles', RoleController::class);
    Route::post('login', [UserController::class, 'login']);
});

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
    $token = csrf_token();
    return response()->json($token);
});

Route::get('/authenticated-user', function () {
    return response()->json(
        [
            "Currently authenticated user" => auth()->user()->full_name ?? "No user is currently authenticated in",
            "Role" => auth()->user()->role->name ?? "No role assigned"
        ]
    );
});
