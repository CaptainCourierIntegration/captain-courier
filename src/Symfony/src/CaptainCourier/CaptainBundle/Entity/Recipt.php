<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Recipt
 */

class Recipt extends \CaptainCourier\CaptainBundle\Entity\Normality\Recipt
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