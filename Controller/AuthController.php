<?php

namespace Controller;


use Controller\Validator\LoginValidation;
use Controller\Validator\RegisterValidation;
use Usecase\TokenHandler;
use Usecase\UserCreation;
use Usecase\UserLogin;

class AuthController extends BaseController
{
    private $registerValidator;
    private $loginValidator;
    private $userCreation;
    private $tokenHandler;
    private $userLogin;

    public function __construct(RegisterValidation $registerValidator, UserCreation $userCreation,
                                TokenHandler $tokenHandler, loginValidation $loginValidation, UserLogin $userLogin)
    {
        parent::__construct();

        $this->registerValidator = $registerValidator;
        $this->userCreation = $userCreation;
        $this->tokenHandler = $tokenHandler;
        $this->loginValidator = $loginValidation;
        $this->userLogin = $userLogin;
    }

    public function login()
    {
        $this->loginValidator->validate();
        $this->userLogin->login();
        $this->tokenHandler->createToken();

        showJsonResponse(200, [
                "message" => "You Successfully logged in", "token" => $this->tokenHandler->getToken(),
                "username" => $_POST['username'],
                "expireAt" => $this->tokenHandler->getExpiration()
            ]
        );
    }

    public function register()
    {
        $this->registerValidator->validate();

        $this->userCreation->createUser();
        $this->tokenHandler->createToken();

        showJsonResponse(200, [
                "message" => "You Successfully registered", "token" => $this->tokenHandler->getToken(),
                "username" => $_POST['username'],
                "expireAt" => $this->tokenHandler->getExpiration()
            ]
        );
    }
}