<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator())->attempt($email, $password)) {
        redirect('/');
    }
    $form->error('login', 'email or password incorrect');
};

Session::flash('errors', $form->errors());
Session::put('old', [
    'email' => $email,
]);
redirect('/login');



