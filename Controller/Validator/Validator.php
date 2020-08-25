<?php


namespace Controller\Validator;


trait Validator
{
    protected $errors;

    function __construct()
    {
        $this->errors = array();
    }

    private function checkValidationErrors()
    {
        if (count($this->errors) > 0) {
            showJsonResponse(422, $this->errors);
            exit();
        }
    }
}