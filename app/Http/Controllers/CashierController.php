<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CashierController extends Controller
{
    public function Register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:6',
            'phone_number' => 'required|string|min:11',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $cashier = Cashier::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
        ]);

        return response(['message' => 'Registration successful'], 201);
    }

    public function Login(Request $request){
        $credentials = $request->only('email', 'password');

//         $user = Auth::user();
// dd($user);

        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            $token = auth()->user()->createToken('authToken')->plainTextToken;
            // return response([
            //     'token' => $token,
            //     'user' => $user,
            // ], 200);
            return Redirect::to('/admin/cashier/dashboard');


        } else {
            return response(['error' => 'Invalid Credentials'], 401);
        }
    }

    public function Logout(Request $request){
        // Revoke the user's access tokens
        auth()->user()->tokens()->delete();

        // Logout the user
        Auth::logout();

        // Clear the user's session (optional)
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return response(['message' => 'Logout successful'], 200);
    }
}
