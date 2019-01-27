<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use JWTAuthException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:5',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = new User([
            'name'     => $name,
            'email'    => $email,
            'password' => bcrypt($password),
        ]);

        $credentials = [
            'email'    => $email,
            'password' => $password,
        ];

        if ($user->save()) {

            $token = null;
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'msg' => 'Email or Password are incorrect',
                    ], 404);
                }
            } catch (JWTAuthException $e) {
                return response()->json([
                    'msg' => 'failed_to_create_token',
                ], 404);
            }

            $user->signin = [
                'href'   => 'api/v1/user/signin',
                'method' => 'POST',
                'params' => 'email, password',
            ];
            $response = [
                'msg'   => 'User created',
                'user'  => $user,
                'token' => $token,
            ];
            return response()->json($response, 201);
        }
        $response = [
            'msg' => 'An error occurred',
        ];
        return response()->json($response, 404);}

    /**
     * Signin a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
        return 'It works';
    }
}
