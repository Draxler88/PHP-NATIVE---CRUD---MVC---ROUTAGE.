<?php


$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->get('/notes/create', 'notes/create.php');
$router->patch('/note/edit', 'notes/edit.php');

$router->post('/notes', 'notes/store.php');
$router->delete('/notes', 'notes/destroy.php');
$router->patch('/note/update', 'notes/update.php');

$router->get('/register', 'registration/index.php')->only('guest');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'registration/login.php')->only('guest');
$router->post('/login', 'registration/login_in.php')->only('guest');


$router->delete('/logout', 'registration/logout.php')->only('auth');