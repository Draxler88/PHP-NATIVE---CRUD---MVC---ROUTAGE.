<?php

use Core\Database;
use Core\Session;
use Http\Forms\LoginForm;
$db = App::resolve(Database::class);
$nom = $_POST['nom']; $prenom = $_POST['pre-nom']; $email = $_POST['email']; $password = $_POST['password'];

$form = new LoginForm();
if (! $form->validateForm($nom, $prenom, $email, $password)) {
    Session::flash('old', [
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
    ]);
    Session::put('errors', $form->errors());
    redirect('/register');
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->fetch();
if ($user) {
    $form->error('email', 'email has been exist');
    Session::flash('old', [
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
    ]);
    Session::put('errors', $form->errors());
    redirect('/register');
};

$register = $db->query('INSERT INTO users(id, nom, prenom, email, password) VALUES (null, :nom, :prenom, :email, :password)', [
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
]);

$register = $db->query('select * from users where email = :email', [
    'email' => $email,
])->fetch();


Session::flash('errors', $form->errors());

Session::put('email', $register['email']);
Session::put('id', $register['id']);
Session::flash('old', [
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
]);

 redirect('/');