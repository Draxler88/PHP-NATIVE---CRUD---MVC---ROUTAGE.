<?php

namespace Core;


use App;
use JetBrains\PhpStorm\NoReturn;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email,
        ])->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                return true;
            };
        };
        return false;
    }

    public function logout()
    {
        Session::destroy();
    }

    function login($user): void
    {
        Session::put('email', $user['email']);
        Session::put('id', $user['id']);
    }

}

