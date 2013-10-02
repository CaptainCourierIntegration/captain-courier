<?php

namespace CaptainCourier\CaptainBundle\Security;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{

    public $data;

    public function __construct( array $data )
    {
        $this->data = $data;
        d($this->getPassword() );
    }

    public function getRoles()
    {
        return array('ROLE_USER', 'ROLE_API');
    }

    public function getPassword()
    {
        return $this->data['hash'];
    }

    public function getSalt()
    {
        return $this->data['salt'];
    }

    public function getUsername()
    {
        return $this->data['email'];
    }

    public function eraseCredentials()
    {
    }

}