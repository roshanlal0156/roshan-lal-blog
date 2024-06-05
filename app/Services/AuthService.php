<?php

namespace App\Services;

use App\Models\User;

class AuthService {
    public function createJwt($user_id) {
        $user = User::where('_id', $user_id)->first();
        $headers = ["alg" => "HS256", "type" => "JWT"];
        $headers = base64_encode(json_encode($headers));

        $payload = ["role" => $user->role, "user_id" => $user->_id];
        $payload = base64_encode(json_encode($payload));

        $signature = env('SECRET_KEY');
        $signature = hash_hmac('sha256', "$headers.$payload", $signature, true);

        $token = "$headers.$payload.$signature";

        return $token;
    }

    public function isJwtValid($user_id, $jwt) {
        $token = $this->createJwt($user_id);
        return $jwt === $token;
    }

    public function checkForRole($user_id, $role) {
        $user = User::where('_id', $user_id)->first();
        return $user->role === $role;
    }
}