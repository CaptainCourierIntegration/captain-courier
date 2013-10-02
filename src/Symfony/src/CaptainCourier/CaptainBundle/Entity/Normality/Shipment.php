<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Entity\Base;
use Bond\Entity\StaticMethods;
use Bond\Repository;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Shipment
 */
class Shipment extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Shipment';
    
    /**
     * Additional properties
     * @var array
     */
    protected static $additionalProperties = ['ShipmentTrackingLogs', 'AbortStatuss'];
    
    /**
     * Columns defined in captain.Shipment
     * @var array
     */
    protected $data = array(
        'id' => null, # PK; is referenced by ShipmentTrackingLog.shipmentId, AbortStatus.shipmentId
        'collectionAddressId' => null, # references Address.id
        'deliveryAddressId' => null, # references Address.id
        'parcelId' => null, # references Parcel.id
    );
    
    /**
     * Object properties which comprise this Entity's key.
     * @var array
     */
    protected static $keyProperties = ['id'];
    
    /**
     * The property used for lateLoading
     * @var string
     */
    protected static $lateLoadProperty = 'id';
    
    /**
    * Symfony Validator Metadata.
    *
    * @param ClassMetadata $metadata
    * @return void
    */
    protected static function _loadValidatorMetadata( ClassMetadata $metadata )
    {
        $metadata->addPropertyConstraint(
            'collectionAddressId',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'collectionAddressId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Address',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'deliveryAddressId',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'deliveryAddressId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Address',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'parcelId',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'parcelId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Parcel',
                )
            )
        );
    
    }
    
    /**
     * Is a zombie object?
     * @inheritDoc
     */
    public function isZombie()
    {
        return ( null === $this->data['collectionAddressId'] ) or ( null === $this->data['deliveryAddressId'] ) or ( null === $this->data['parcelId'] );
    }
    
    /**
     * Get entity property
     * {@inheritDoc}
     */
    public function get( $key, $inputValidate = null, $source = null, \Bond\RecordManager\Task $task = null )
    {
        switch( $key ) {
    
            case 'Address':
                $key = 'collectionAddressId';
                break;
            
            case 'Address':
                $key = 'deliveryAddressId';
                break;
            
            case 'Parcel':
                $key = 'parcelId';
                break;
            
            case 'ShipmentTrackingLogs':
                return $this->r()->referencesGet( $this, 'ShipmentTrackingLog.shipmentId' );
            
            case 'AbortStatuss':
                return $this->r()->referencesGet( $this, 'AbortStatus.shipmentId' );
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCollectionAddressId() { return $this->get('collectionAddressId'); }
    function getDeliveryAddressId() { return $this->get('deliveryAddressId'); }
    function getId() { return $this->get('id'); }
    function getParcelId() { return $this->get('parcelId'); }
    
    /**
     * 'get' callback for $this->data['collectionAddressId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Address
     */
    protected function get_collectionAddressId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Address', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['collectionAddressId']
     * @param mixed $value
     * @return Address
     */
    protected function set_collectionAddressId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Address ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Address', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Address::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('collectionAddressId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Address');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Address::r()->make(); // old stylee
            }
            $entity->set( $value, null, self::VALIDATE_STRIP );
            return $entity;
        }
        return null;
    }
    
    /**
     * 'get' callback for $this->data['deliveryAddressId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Address
     */
    protected function get_deliveryAddressId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Address', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['deliveryAddressId']
     * @param mixed $value
     * @return Address
     */
    protected function set_deliveryAddressId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Address ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Address', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Address::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('deliveryAddressId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Address');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Address::r()->make(); // old stylee
            }
            $entity->set( $value, null, self::VALIDATE_STRIP );
            return $entity;
        }
        return null;
    }
    
    /**
     * 'get' callback for $this->data['parcelId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Parcel
     */
    protected function get_parcelId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Parcel', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['parcelId']
     * @param mixed $value
     * @return Parcel
     */
    protected function set_parcelId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Parcel ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Parcel', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Parcel::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('parcelId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Parcel');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Parcel::r()->make(); // old stylee
            }
            $entity->set( $value, null, self::VALIDATE_STRIP );
            return $entity;
        }
        return null;
    }
    
    /**
     * Impementation of interface \Bond\Pg\Query->Validate()
     * @return scalar
     */
    public function parse( QuoteInterface $quoting )
    {
        return $this->data['id'] !== null ? (string) (int) $this->data['id'] : 'NULL';
    }
    
    /**
     * Set entity property
     * {@inheritDoc}
     */
    public function set( $key, $value = null, $inputValidate = null )
    {
        switch( $key ) {
    
            case 'Address':
                $key = 'collectionAddressId';
                break;
            
            case 'Address':
                $key = 'deliveryAddressId';
                break;
            
            case 'Parcel':
                $key = 'parcelId';
                break;
            
            case 'ShipmentTrackingLogs':
                return StaticMethods::set_references( $this, 'ShipmentTrackingLog.shipmentId', $value );
            
            case 'AbortStatuss':
                return StaticMethods::set_references( $this, 'AbortStatus.shipmentId', $value );
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCollectionAddressId($value) { return $this->set('collectionAddressId',$value); }
    function setDeliveryAddressId($value) { return $this->set('deliveryAddressId',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setParcelId($value) { return $this->set('parcelId',$value); }
    
}