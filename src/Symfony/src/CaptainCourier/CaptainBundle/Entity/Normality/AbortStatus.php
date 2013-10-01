<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Entity\Base;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.AbortStatus
 */
class AbortStatus extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/AbortStatus';
    
    /**
     * Columns defined in captain.AbortStatus
     * @var array
     */
    protected $data = array(
        'id' => null, # PK;
        'shipmentId' => null, # references Shipment.id
        'status' => null,
        'message' => null,
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
            'shipmentId',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'shipmentId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Shipment',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'status',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'status',
            new Choice(
                array(
                    'choices' => 
                    array (
                        0 => 'success',
                        1 => 'rejected',
                    ),
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'message',
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
        return ( null === $this->data['shipmentId'] );
    }
    
    /**
     * Get entity property
     * {@inheritDoc}
     */
    public function get( $key, $inputValidate = null, $source = null, \Bond\RecordManager\Task $task = null )
    {
        switch( $key ) {
    
            case 'Shipment':
                $key = 'shipmentId';
                break;
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getId() { return $this->get('id'); }
    function getMessage() { return $this->get('message'); }
    function getShipmentId() { return $this->get('shipmentId'); }
    function getStatus() { return $this->get('status'); }
    
    /**
     * 'get' callback for $this->data['shipmentId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Shipment
     */
    protected function get_shipmentId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Shipment', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['shipmentId']
     * @param mixed $value
     * @return Shipment
     */
    protected function set_shipmentId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Shipment ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Shipment', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Shipment::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('shipmentId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Shipment');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Shipment::r()->make(); // old stylee
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
    
            case 'Shipment':
                $key = 'shipmentId';
                break;
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setId($value) { return $this->set('id',$value); }
    function setMessage($value) { return $this->set('message',$value); }
    function setShipmentId($value) { return $this->set('shipmentId',$value); }
    function setStatus($value) { return $this->set('status',$value); }
    
}