<?php

namespace CaptainCourier\CaptainBundle\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

use Bond\EntityManager;

// use PrintNode\MainBundle\Entity\Account;
// use Bond\Repository;
// use Bond\Pg\Exception\Query as QueryException;

class DbProvider implements UserProviderInterface
{

    private $entityManager;

    public function __construct( EntityManager $entityManager )
    {
        $this->entityManager = $entityManager;
        d("fuck");
    }

    function loadUserByUsername($username)
    {

        d($username);
        die();

        $accountRepository = Repository::init('Account');

        try {

            if (!($account = $accountRepository->findOneByEmail($username))) {

                throw new UsernameNotFoundException(
                    sprintf(
                        'User "%s" does not exist.',
                        $username
                    )
                );
            }

        } catch (QueryException $e) {

            throw new UsernameNotFoundException(
                sprintf(
                    'Server error.',
                    $username
                )
            );
        }

        return $account;
    }

    function refreshUser(UserInterface $user)
    {
        if (!$user instanceof Account) {

            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    get_class($user)
                )
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    function supportsClass($class)
    {
        return $class == 'PrintNode\MainBundle\Entity\Account';
    }
}