<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //return new UserResource($user);
        return $user->getPermissionsViaRoles()->pluck('name');
        //return $user->can('create medication');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $credentials = request(['username', 'password']);
        if(!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Login credentials are not valid',
                'errors' => [
                    'password' => [
                        'Invalid Credentials'
                    ]
                ]
            ], 422);
        }

        $user = User::where('username', $request->username)->first();
        $token = auth()->user()->createToken('auth-token')->plainTextToken;

        return response()->json([
            'access_token'=>$token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message'=>'Successfully logged out'
        ]);
    }
}
