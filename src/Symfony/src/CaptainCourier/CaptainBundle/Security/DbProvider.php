<?php

namespace CaptainCourier\CaptainBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

use Bond\EntityManager;
use Bond\Sql\Query;
use Bond\Pg\Result;

// use PrintNode\MainBundle\Entity\Account;
// use Bond\Repository;
// use Bond\Pg\Exception\Query as QueryException;

class DbProvider implements UserProviderInterface
{

    private $entityManager;
    private $db;

    public function __construct( EntityManager $entityManager )
    {
        $this->entityManager = $entityManager;
        $this->db = $this->entityManager->db;
    }

    function loadUserByUsername($username)
    {

        try {
            $query = new Query( <<<SQL
                SELECT
                    u.id,
                    email,
                    "apiKey",
                    "hashType",
                    hash,
                    salt
                FROM
                    "User" u
                INNER JOIN
                    "Authentication" a ON "authenticationId" = a.id
                WHERE
                    email = %email:%
SQL
                , [ "email" => $username ]
            );

            $user = $this->db->query($query)->fetch(Result::FETCH_SINGLE);
        } catch ( \Exception $e ) {
            d($e);
            throw $e;
        }

        if( !$user ) {
            $exception = new UsernameNotFoundException();
            $exception->setUsername($username);
            throw $exception;
        };

        try {
            $user = new User($user);
        } catch ( \Exception $e ) {
            d($e);
            throw $e;
        }

        return $user;

    }

    function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername( $user->getUsername() );
    }

    function supportsClass($class)
    {
        return $class === User::class;
    }
}