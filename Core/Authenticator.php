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

    #[NoReturn] public function logout(): void
    {
        $_SESSION = [];

        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

        header('location: /');
        exit();
    }

    function login($user): void
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'id' => $user['id']
        ];

    }

}

