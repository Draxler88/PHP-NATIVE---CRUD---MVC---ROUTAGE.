<?php
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$nom = $_POST['nom'];
$prenom = $_POST['pre-nom'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::string($nom)){
    $errors['nom'] = 'you should put a valid nom';
}

if (!Validator::string($prenom)){
    $errors['prenom'] = 'you should put a valid prenom';
}

if (!Validator::email($email)){
    $errors['email'] = 'you should put a valid email';
}

if (!Validator::string($password, 7)){
    $errors['password'] = 'you should put a password bigger than 7 char';
}

if (count($errors)){
    view('registration/index.view.php', [
        'errors' => $errors,
    ]);
    die();
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->fetch();
if($user['email']){
    header('location: /login');
    return;
};

$db->query('INSERT INTO users(id, nom, prenom, email, password) VALUES (null, :nom, :prenom, :email, :password)', [
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT),
]);

$_SESSION['user'] = ['email' => $email];

header('location: /');
exit();