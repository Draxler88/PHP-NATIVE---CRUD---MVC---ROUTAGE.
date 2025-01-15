<?php

use Core\Authenticator;
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

view('registration/login.view.php', [
    'errors' => $form->errors(),
]);
return;




