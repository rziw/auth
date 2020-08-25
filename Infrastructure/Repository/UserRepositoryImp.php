<?php
namespace Infrastructure\Repository;

use Gateway\UserRepository;
use Entity\Model\User;

class UserRepositoryImp implements UserRepository
{
    public $db;

    function __construct(DBconf $DBconf)
    {
        $this->db = $DBconf;
        $this->db->setUp();
    }

    function store(User $user)
    {
        $this->db->entityManager->persist($user);
        $this->db->entityManager->flush();
    }

    function findByUsername(string $username)
    {
        return $this->db->entityManager->getRepository('Entity\Model\User')->findOneBy(array('username' => $username));
    }
}