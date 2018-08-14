<?php

namespace App\Service;

use App\Models\User;
class UserService {
    public function register($data) {
        $username = $data['username'];
        $password = $data['password'];
        $email = isset($data['email']) ?: 'default@email.health';

        $password = encrypt($password);

        $user = new User();
        $user->name = $username;
        $user->password = $password;
        $user->email = $email;
        $result = $user->save();

        return $result;
    }
}