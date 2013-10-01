<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Register;

class EntityManager
{    

    /**
     * Register a set of entities with a EntityManager
     * @inheritDoc
     */
    public function __construct( \Bond\EntityManager $em )
    {
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\AbortStatus', 'CaptainCourier\\CaptainBundle\\Repository\\AbortStatus' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Account', 'CaptainCourier\\CaptainBundle\\Repository\\Account' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Address', 'CaptainCourier\\CaptainBundle\\Repository\\Address' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Authentication', 'CaptainCourier\\CaptainBundle\\Repository\\Authentication' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Country', 'CaptainCourier\\CaptainBundle\\Repository\\Country' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Courier', 'CaptainCourier\\CaptainBundle\\Repository\\Courier' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\CustomsInfo', 'CaptainCourier\\CaptainBundle\\Repository\\CustomsInfo' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Item', 'CaptainCourier\\CaptainBundle\\Repository\\Item' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Label', 'CaptainCourier\\CaptainBundle\\Repository\\Label' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Parcel', 'CaptainCourier\\CaptainBundle\\Repository\\Parcel' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Quote', 'CaptainCourier\\CaptainBundle\\Repository\\Quote' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Recipt', 'CaptainCourier\\CaptainBundle\\Repository\\Recipt' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Service', 'CaptainCourier\\CaptainBundle\\Repository\\Service' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\Shipment', 'CaptainCourier\\CaptainBundle\\Repository\\Shipment' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\ShipmentTrackingLog', 'CaptainCourier\\CaptainBundle\\Repository\\ShipmentTrackingLog' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\ShipmentTrackingLogEntry', 'CaptainCourier\\CaptainBundle\\Repository\\ShipmentTrackingLogEntry' );
        $em->register( 'CaptainCourier\\CaptainBundle\\Entity\\User', 'CaptainCourier\\CaptainBundle\\Repository\\User' );
    }
    
}