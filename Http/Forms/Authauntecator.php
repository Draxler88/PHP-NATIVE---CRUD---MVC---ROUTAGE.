<?php

namespace Http\Forms;



class Authauntecator
{
    public function attempt($email, $password)
    {

    }
}

//$user = $db->query('SELECT * FROM users WHERE email = :email', [
//    'email' => $email,
//])->fetch();
//
//
//if (!$user){
//    view('registration/login.view.php', [
//        'errors' => ['login' => 'incorrect'],
//    ]);
//    die();
//};
//
//if(password_verify($password, $user['password'])){
//    login($user);
//    header('location: /');
//    die();
//};
//
//view('registration/login.view.php', [
//    'errors' => [
//        'login' => 'email or password incorrect'
//    ],
//]);
