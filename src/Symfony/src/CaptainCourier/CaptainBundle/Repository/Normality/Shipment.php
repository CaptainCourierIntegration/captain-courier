<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Shipment
 */
class Shipment extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Shipment';
    
    /**
     * API options from relation
     * @var array
     */
    protected $apiOptions = '[]';
    
    /**
     * Datatype information used by this entity. See, Bond\Entity\DataType
     * @var array
     */
    protected $dataTypes = [
        'id' => '["id","Shipment","Shipment.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_Shipment_id\\"\'::regclass)"}]',
        'collectionAddressId' => '["collectionAddressId","Shipment","Shipment.collectionAddressId",{"type":"int","entity":"normality","normality":"Address"}]',
        'deliveryAddressId' => '["deliveryAddressId","Shipment","Shipment.deliveryAddressId",{"type":"int","entity":"normality","normality":"Address"}]',
        'parcelId' => '["parcelId","Shipment","Shipment.parcelId",{"type":"int","entity":"normality","normality":"Parcel"}]',
    ];
    
    /**
     * Form options from relation
     * @var array
     */
    protected $formOptions = '[]';
    
    /**
     * Initial properties to be stored by a entity.
     * @var array
     */
    protected $initialProperties = ['collectionAddressId', 'deliveryAddressId', 'parcelId'];
    
    /**
     * Link information for this relation
     * @var array
     */
    protected $links = '[]';
    
    /**
     * Normality tags from relation
     * @var array
     */
    protected $normality = '[]';
    
    /**
     * Reference information for this relation
     * @var array
     */
    protected $references = '{"ShipmentTrackingLog.shipmentId":["ShipmentTrackingLog","shipmentId",1],"AbortStatus.shipmentId":["AbortStatus","shipmentId",1]}';
    
    /**
     * Options Resolver
     * @var array
     */
    private $resolver;
    
    /**
     * Resolver getter. Singleton
     * @return Symfony\Component\Options\Resolver
     */
    public function resolverGet()
    {
        // do we already have a resolver instance
        if( !$this->resolver ) {
    
            $resolver = new OptionsResolver();                        
            $resolver->setRequired(
                array(
                    0 => 'collectionAddressId',
                    1 => 'deliveryAddressId',
                    2 => 'parcelId',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}