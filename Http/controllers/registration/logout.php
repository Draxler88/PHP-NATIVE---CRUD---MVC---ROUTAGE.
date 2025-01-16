<?php


use Core\Authenticator;

(new Authenticator())->logout();

dd($_SESSION);