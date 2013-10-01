<?php

namespace CaptainCourier\CaptainBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Courier
 */

class Courier extends \CaptainCourier\CaptainBundle\Entity\Normality\Courier
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