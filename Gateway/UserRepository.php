<?php

namespace Gateway;

use Entity\Model\User;

interface UserRepository
{
    function store(User $user);
    function findByUsername(String $username);
}