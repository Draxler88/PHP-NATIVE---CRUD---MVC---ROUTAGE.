<?php

use Core\Session;

view('registration/index.view.php', [
    'errors' => Session::get('errors'),
]);