<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Auth login
     *
     * @param $request->email
     * @param $request->password
     * @return $user
     * @return $token
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'These credentials do not match our records.'
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token
        ];

        return response()->json($response);
    }

    /**
     * Auth logout
     *
     * @param $request->user()
     * @return void
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->where('id', $request->user()->currentAccessToken()->id)->delete();

        $response = [
            'message' => 'Logout successful',
            'user' => $user
        ];

        return response()->json($response);
    }

    /**
     * Get user information
     *
     * @param $request->user()
     * @return $user
     */
    public function user(Request $request)
    {
        $user = $request->user();

        return response()->json($user);
    }
}
