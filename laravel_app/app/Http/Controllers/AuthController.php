<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $req)
    {
        // Validate
        $rules = [
            'name' => 'required|string',
            'mobile_number' => 'required|string|min:10|max:15|unique:users', // Ensure mobile number is unique
            'email' => 'string|unique:users', // Email not required but should be unique if provided
            'password' => 'string|min:6', // Password not required
            'date_of_birth' => 'date', // Date of birth not required
            'gender' => 'string|in:male,female,other', // Gender not required
            'height' => 'numeric|min:0', // Height not required
            'weight' => 'numeric|min:0' // Weight not required
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create new user in users table
        $user = User::create([
            'name' => $req->name,
            'mobile_number' => $req->mobile_number,
            'email' => $req->email,
            'password' => $req->password ? Hash::make($req->password) : null,
            'date_of_birth' => $req->date_of_birth,
            'gender' => $req->gender,
            'height' => $req->height,
            'weight' => $req->weight
        ]);

        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return response()->json($response, 200);
    }

    public function login(Request $req)
    {
        // Validate inputs
        $rules = [
            'mobile_number' => 'required|string',
            'password' => 'required|string'
        ];
        $req->validate($rules);

        // Find user by mobile number in users table
        $user = User::where('mobile_number', $req->mobile_number)->first();

        // If user found and password is correct
        if ($user && Hash::check($req->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['user' => $user, 'token' => $token];
            return response()->json($response, 200);
        }

        $response = ['message' => 'Incorrect mobile number or password'];
        return response()->json($response, 400);
    }

    public function checkMobileNumber(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required|string|min:10|max:15',
        ]);

        $mobileNumber = $request->input('mobile_number');
        $user = User::where('mobile_number', $mobileNumber)->first();

        if ($user) {
            if ($user->payment_status == 0) {
                return response()->json([
                    'status' => 'inactive',
                    'message' => 'User is Inactive',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'active',
                    'payment_status' => $user->payment_status,
                    'subscription_period' => $user->subscription_period,
                    'payment_date' => $user->payment_date,
                ], 200);
            }
        } else {
            return response()->json([
                'status' => 'not_found',
                'message' => 'Mobile number not found in the user table',
            ], 404);
        }
    }
}
