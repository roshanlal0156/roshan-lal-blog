<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function loginView()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);
        // get the data from request
        $user_name = $request->get('user_name');
        $password = $request->get('password');

        // find user and check credentials
        $user = User::where([
            'user_name' => $user_name,
            'password' => $password
        ])->first();

        // if creditials are correct then generate jwttoken
        if ($user) {
            $token = $this->authService->createJwt($user->_id);

            return Redirect::to('/api')->withCookies([Cookie::make('jwt', $token), Cookie::make('user_id', $user->_id)]);
        }
        return Redirect::to('api/login-view');
    }
}
