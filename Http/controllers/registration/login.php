<?php
if($_SESSION['user'] ?? false){
    header('location: /');
    die();
}
view('registration/login.view.php', [
    'errors' => [],
]);
