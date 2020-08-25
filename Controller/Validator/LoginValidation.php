<?php


namespace Controller\Validator;


class LoginValidation
{
    use Validator;

    public function validate()
    {
        $this->validateUsername();
        $this->validatePassword();
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
        }
    }
}