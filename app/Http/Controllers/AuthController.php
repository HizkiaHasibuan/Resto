<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    // public function Login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);


    //     $infologin = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];

    //     if(Auth::attempt($infologin)){
    //         return redirect()->route('admin.dashboard', ['userData' => Auth::user()]);
    //     }else{
    //         // return redirect('/admin/cashier');
    //         // return redirect()->route('admin.dashboard');
    //     }

    //     $response = Http::post('http://127.0.0.1:9000/api/login', [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ]);

    //     // // dd($response);

    //     // // Check if the login was successful
    //     // if ($response->successful()) {

    //     //     $userData = $response->json();
    //     //     // If successful, redirect to the welcome page
    //     //     return redirect()->route('admin.dashboard', ['userData' => $userData]);
    //     // } else {
    //     //     // If login fails, stay on the login page with an error message
    //     //     return view('admin.login')->withErrors(['error' => 'Invalid credentials']);
    //     // }
    // }

    public function Login(Request $request)
    {
        $response = Http::post('http://127.0.0.1:9000/api/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        // dd($response);

        // Check if the login was successful
        if ($response->successful()) {

            $userData = $response->json();
            // If successful, redirect to the welcome page
            return redirect()->route('admin.dashboard', ['userData' => $userData]);
        } else {
            // If login fails, stay on the login page with an error message
            return view('admin.login')->withErrors(['error' => 'Invalid credentials']);
        }
    }

    public function Dashboard(Request $request){
        // Retrieve the user data from the query parameters
        $userData = $request->query('userData',[]);

        // Use $userData in your view or controller logic
        return view('admin.dashboard', ['userData' => $userData]);
    }

    public function menu(Request $request){
        // Retrieve the user data from the query parameters
        // $userData = $request->query('userData',[]);

        // Use $userData in your view or controller logic
        return view('admin.menu');
    }
}
