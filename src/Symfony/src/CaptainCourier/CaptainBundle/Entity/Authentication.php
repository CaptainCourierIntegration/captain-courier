<?php

namespace CaptainCourier\CaptainBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Authentication
 */

class Authentication extends \CaptainCourier\CaptainBundle\Entity\Normality\Authentication
{    

    /**
     * Symfony Validator Metadata.
     * WARNING! Workaround. Symfony validator uses its own inheritance mechanism. This unusual setup is designed to short circuit that.
     *
     * @param ClassMetadata $metadata
     * @return void
     */
    public static function loadValidatorMetadata( ClassMetadata $metadata )
    {
        parent::_loadValidatorMetaData( $metadata );
    }
    
}