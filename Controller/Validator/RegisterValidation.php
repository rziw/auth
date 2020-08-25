<?php


namespace Controller\Validator;

class RegisterValidation
{
    use Validator;

    public function validate()
    {
        $this->validateUsername();
        $this->validatePassword();
        $this->validateConfirmPassword();
        $this->checkValidationErrors();
    }

    public function validateUsername()
    {
        if (!isset($_POST['username']) || is_null($_POST['username']) || empty($_POST['username'])) {
            array_push($this->errors, 'username is required');
        }
    }

    public function validatePassword()
    {
        if (!isset($_POST['password']) || is_null($_POST['password']) || empty($_POST['password'])) {
            array_push($this->errors, 'password is required');
        } elseif(strlen($_POST['password']) < 4) {
            array_push($this->errors, 'password length should be greater than 4');
        }
    }

    public function validateConfirmPassword()
    {
        if (!isset($_POST['password_confirmation']) || is_null($_POST['password_confirmation']) || empty($_POST['password_confirmation'])) {
            array_push($this->errors, 'password_confirmation is required');
        } elseif (isset($_POST['password']) && $_POST['password_confirmation'] != $_POST['password']) {
            array_push($this->errors, 'password_confirmation not match');
        }
    }
}