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
        'collectionTime' => '["collectionTime","Shipment","Shipment.collectionTime",{"type":"tsrange","entity":"DateRange"}]',
        'deliveryAddressId' => '["deliveryAddressId","Shipment","Shipment.deliveryAddressId",{"type":"int","entity":"normality","normality":"Address"}]',
        'deliveryTime' => '["deliveryTime","Shipment","Shipment.deliveryTime",{"type":"tsrange","entity":"DateRange"}]',
        'contractNumber' => '["contractNumber","Shipment","Shipment.contractNumber",{"type":"citext"}]',
        'serviceCode' => '["serviceCode","Shipment","Shipment.serviceCode",{"type":"citext"}]',
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
    protected $initialProperties = ['collectionAddressId', 'deliveryAddressId'];
    
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
    protected $references = '{"ShipmentTrackingLog.shipmentId":["ShipmentTrackingLog","shipmentId",1],"Recipt.shipmentId":["Recipt","shipmentId",1],"Item.shipmentId":["Item","shipmentId",1],"AbortStatus.shipmentId":["AbortStatus","shipmentId",1]}';
    
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
                    1 => 'collectionTime',
                    2 => 'deliveryAddressId',
                    3 => 'deliveryTime',
                    4 => 'contractNumber',
                    5 => 'serviceCode',
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