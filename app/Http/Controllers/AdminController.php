<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

            $admin = Admin::create([
                'firstname' => $validatedData['firstname'],
                'lastname' => $validatedData['lastname'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

        $token = $admin->createToken('auth_token')->plainTextToken;

            return response()->json([
                    'access_token' => $token,
                        'token_type' => 'Bearer',
        ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // if (!Auth::attempt($credentials)) {
        //     return response()->json(['message' => 'Invalid login details'], 401);
        // }

        $admin = Admin::where('email',"=", $request->input("email"))->firstOrFail();

        $token = $admin->createToken('auth_token')->plainTextToken;

         return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
    ]);
    }
    public function me(Request $request)
    {
         return $request->admin();
    }
    // Search method to get all our Admins 
    public function search($name)
    {
        return Admin::where("name","like","%".$name."%")->get();
    }
}
