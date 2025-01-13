<?php


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->patch('/note/edit', 'controllers/notes/edit.php');

$router->post('/notes', 'controllers/notes/store.php');
$router->delete('/notes', 'controllers/notes/destroy.php');
$router->patch('/note/update', 'controllers/notes/update.php');

$router->get('/register', 'controllers/registration/index.php');
$router->post('/register', 'controllers/registration/store.php');

$router->get('/login', 'controllers/registration/login.php');
$router->post('/login', 'controllers/registration/login_in.php');
