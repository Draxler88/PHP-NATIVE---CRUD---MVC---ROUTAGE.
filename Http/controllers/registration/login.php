<?php

use Core\Session;


view('registration/login.view.php', [
    'errors' => Session::get('errors'),
]);
