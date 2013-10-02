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
        'collectionTime' => null,
        'deliveryAddressId' => null, # references Address.id
        'deliveryTime' => null,
        'contractNumber' => null,
        'serviceCode' => null,
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
            'collectionTime',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'collectionTime',
            new Type(
                array(
                    'type' => 'Bond\\Entity\\Types\\DateRange',
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
            'deliveryTime',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'deliveryTime',
            new Type(
                array(
                    'type' => 'Bond\\Entity\\Types\\DateRange',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'contractNumber',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'contractNumber',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'serviceCode',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'serviceCode',
            new Type(
                array(
                    'type' => 'string',
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
        return ( null === $this->data['collectionAddressId'] ) or ( null === $this->data['deliveryAddressId'] );
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
            
            case 'ShipmentTrackingLogs':
                return $this->r()->referencesGet( $this, 'ShipmentTrackingLog.shipmentId' );
            
            case 'AbortStatuss':
                return $this->r()->referencesGet( $this, 'AbortStatus.shipmentId' );
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCollectionAddressId() { return $this->get('collectionAddressId'); }
    function getCollectionTime() { return $this->get('collectionTime'); }
    function getContractNumber() { return $this->get('contractNumber'); }
    function getDeliveryAddressId() { return $this->get('deliveryAddressId'); }
    function getDeliveryTime() { return $this->get('deliveryTime'); }
    function getId() { return $this->get('id'); }
    function getServiceCode() { return $this->get('serviceCode'); }
    
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
     * 'get' callback for $this->data['collectionTime']
     * @param mixed $value
     * @return DateRange
     */
    protected function get_collectionTime( &$value )
    {
        return StaticMethods::get_DateRange( $value );
    }
    
    /**
     * 'set' callback for $this->data['collectionTime']
     * @param mixed $value
     * @return DateRange
     */
    protected function set_collectionTime( $value, $inputValidate )
    {
        return StaticMethods::set_DateRange( $value, $inputValidate );
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
     * 'get' callback for $this->data['deliveryTime']
     * @param mixed $value
     * @return DateRange
     */
    protected function get_deliveryTime( &$value )
    {
        return StaticMethods::get_DateRange( $value );
    }
    
    /**
     * 'set' callback for $this->data['deliveryTime']
     * @param mixed $value
     * @return DateRange
     */
    protected function set_deliveryTime( $value, $inputValidate )
    {
        return StaticMethods::set_DateRange( $value, $inputValidate );
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
            
            case 'ShipmentTrackingLogs':
                return StaticMethods::set_references( $this, 'ShipmentTrackingLog.shipmentId', $value );
            
            case 'AbortStatuss':
                return StaticMethods::set_references( $this, 'AbortStatus.shipmentId', $value );
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCollectionAddressId($value) { return $this->set('collectionAddressId',$value); }
    function setCollectionTime($value) { return $this->set('collectionTime',$value); }
    function setContractNumber($value) { return $this->set('contractNumber',$value); }
    function setDeliveryAddressId($value) { return $this->set('deliveryAddressId',$value); }
    function setDeliveryTime($value) { return $this->set('deliveryTime',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setServiceCode($value) { return $this->set('serviceCode',$value); }
    
}