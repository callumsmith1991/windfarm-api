<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends ApiController
{
    public function register(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validation->fails()){
            return $this->sendError('Validation Error.', $validation->errors());       
        }
        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $data = [
            'token' => $user->createToken('AuthToken')->plainTextToken
        ];

        event(new Registered($user));

        Auth::login($user);

        return $this->sendResponse($data, 'User Registered & Logged In Successfully');


    }

    public function logout(Request $request)
    {
        
        Auth::logout();

        $request->session()->invalidate();

        return $this->sendResponse([], 'Logged out successfully');
    }

    public function login(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validation->fails()){
            return $this->sendError('Validation Error.', $validation->errors());       
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = $request->user();
            
            $data = [
                'token' => Auth::user()->tokens->first()
            ];

            return $this->sendResponse($data, 'Logged In Successfully');

        } else {

            return $this->sendError('Login error', [], 401);

        }


    }
}
