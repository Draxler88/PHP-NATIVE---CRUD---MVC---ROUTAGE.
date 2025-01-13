<?php
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::string($password)){
    $errors['password'] = 'insert a valid password';
}

if (!Validator::email($email)){
    $errors['email'] = 'insert a valid email';
}

if(!empty($errors)){
    view('registration/login.view.php', [
        'errors' => $errors,
    ]);
    die();
};

$user = $db->query('SELECT * FROM users WHERE email = :email AND password = :password', [
    'email' => $email,
    'password' => $password,
])->fetch();


if (!$user){
    $errors['login'] = 'email or password incorrect';
    view('registration/login.view.php', [
        'errors' => $errors,
    ]);
    die();
};
$_SESSION['user'] = $user['email'];
header('location: /');
die();