<?php


namespace Usecase;


use Infrastructure\Repository\UserRepositoryImp;

class UserLogin
{
    public $userRepository;

    function __construct(UserRepositoryImp $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
        $user = $this->userRepository->findByUsername($_POST['username']);

        if(is_null($user)) {
            showJsonResponse(401, "credential is invalid");
            exit();
        }

        if(password_verify($_POST['password'], $user->getPassword()) === false) {
            showJsonResponse(401, "credential is invalid");
            exit();
        }
    }
}