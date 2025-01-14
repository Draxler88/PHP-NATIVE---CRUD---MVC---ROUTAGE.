<?php
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if(! $form->validate($email, $password)){
    view('registration/login.view.php', [
        'errors' => $form->errors(),
    ]);
    return ;
};

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email,
])->fetch();


if (!$user){
    view('registration/login.view.php', [
        'errors' => ['login' => 'incorrect'],
    ]);
    die();
};

if(password_verify($password, $user['password'])){
    login($user);
    header('location: /');
    die();
};

view('registration/login.view.php', [
    'errors' => [
        'login' => 'email or password incorrect'
    ],
]);

