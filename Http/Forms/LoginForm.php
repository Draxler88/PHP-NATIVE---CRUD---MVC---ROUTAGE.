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

    public function validateForm($nom, $prenom, $email, $password)
    {
        if (!Validator::string($password)) {
            $this->errors['password'] = 'insert a valid password';
        }
        if (!Validator::email($email)) {
            $this->errors['email'] = 'insert a valid email';
        }
        if (!Validator::string($nom)) {
            $this->errors['nom'] = 'insert a valid nom';
        }
        if (!Validator::string($prenom)) {
            $this->errors['prenom'] = 'insert a valid prenom';
        }
        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message): void
    {
        $this->errors[$field] = $message;
    }

}
