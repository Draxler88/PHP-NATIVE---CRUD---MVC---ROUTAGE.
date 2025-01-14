<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate($email, $password)
    {
        if (!Validator::string($password)) {
            $this->errors['password'] = 'insert a valid password';
        }
        if (!Validator::email($email)) {
            $this->errors['email'] = 'insert a valid email';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors ;
    }
}
