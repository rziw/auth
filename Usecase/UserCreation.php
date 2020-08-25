<?php
namespace Usecase;

use Entity\Model\User;
use Infrastructure\Repository\UserRepositoryImp;

class UserCreation
{
    public $userRepository;

    function __construct(UserRepositoryImp $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser()
    {
        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));

        $this->userRepository->store($user);
    }
}