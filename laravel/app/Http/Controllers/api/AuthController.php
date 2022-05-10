<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
        public function register(Request $request) {
       
        $fields = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'avatar'=>'nullable|string',
            'role'=>'required|string',
            'email' => 'required|string|unique:users,email|max:50',
            'password' => 'required|string',
            'ncin'=>'required|integer|unique:users',


        ]);

        $user = User::create([
            'nom' => $fields['nom'],
            'email' => $fields['email'],
            'prenom' => $fields['prenom'],
            'avatar' => $fields['avatar'],
            'role' => $fields['role'],
            'ncin' => $fields['ncin'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
            $fields = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);
           
            // Check email
            $user = User::where('email', $fields['email'])->first();
    
            // Check password
            if(!$user || !Hash::check($fields['password'], $user->password)) {
                return response([
                    'message' => 'somthing is wrong'
                ], 401);
            }
    
            $token = $user->createToken('myapptoken')->plainTextToken;
    
            $response = [
                'user' => $user,
                'token' => $token
            ];
    
            return response($response, 201);
        }
    
    
    }
    

