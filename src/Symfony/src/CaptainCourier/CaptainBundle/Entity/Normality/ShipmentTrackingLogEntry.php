<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Entity\Base;
use Bond\Entity\StaticMethods;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.ShipmentTrackingLogEntry
 */
class ShipmentTrackingLogEntry extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/ShipmentTrackingLogEntry';
    
    /**
     * Columns defined in captain.ShipmentTrackingLogEntry
     * @var array
     */
    protected $data = array(
        'id' => null, # PK;
        'shipmentTrackingLogId' => null, # references ShipmentTrackingLog.id
        'status' => null,
        'timestamp' => null,
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
            'shipmentTrackingLogId',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'shipmentTrackingLogId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\ShipmentTrackingLog',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'status',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'status',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'timestamp',
            new Type(
                array(
                    'type' => 'Bond\\Entity\\Types\\DateTime',
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
        return ( null === $this->data['shipmentTrackingLogId'] );
    }
    
    /**
     * Get entity property
     * {@inheritDoc}
     */
    public function get( $key, $inputValidate = null, $source = null, \Bond\RecordManager\Task $task = null )
    {
        switch( $key ) {
    
            case 'ShipmentTrackingLog':
                $key = 'shipmentTrackingLogId';
                break;
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getId() { return $this->get('id'); }
    function getShipmentTrackingLogId() { return $this->get('shipmentTrackingLogId'); }
    function getStatus() { return $this->get('status'); }
    function getTimestamp() { return $this->get('timestamp'); }
    
    /**
     * 'get' callback for $this->data['shipmentTrackingLogId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\ShipmentTrackingLog
     */
    protected function get_shipmentTrackingLogId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\ShipmentTrackingLog', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['shipmentTrackingLogId']
     * @param mixed $value
     * @return ShipmentTrackingLog
     */
    protected function set_shipmentTrackingLogId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\ShipmentTrackingLog ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\ShipmentTrackingLog', $value);
            // return \CaptainCourier\CaptainBundle\Entity\ShipmentTrackingLog::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('shipmentTrackingLogId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\ShipmentTrackingLog');
                // $entity = \CaptainCourier\CaptainBundle\Entity\ShipmentTrackingLog::r()->make(); // old stylee
            }
            $entity->set( $value, null, self::VALIDATE_STRIP );
            return $entity;
        }
        return null;
    }
    
    /**
     * 'get' callback for $this->data['timestamp']
     * @param mixed $value
     * @return DateTime
     */
    protected function get_timestamp( &$value )
    {
        return StaticMethods::get_DateTime( $value );
    }
    
    /**
     * 'set' callback for $this->data['timestamp']
     * @param mixed $value
     * @return DateTime
     */
    protected function set_timestamp( $value, $inputValidate )
    {
        return StaticMethods::set_DateTime( $value, $inputValidate );
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
    
            case 'ShipmentTrackingLog':
                $key = 'shipmentTrackingLogId';
                break;
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setId($value) { return $this->set('id',$value); }
    function setShipmentTrackingLogId($value) { return $this->set('shipmentTrackingLogId',$value); }
    function setStatus($value) { return $this->set('status',$value); }
    function setTimestamp($value) { return $this->set('timestamp',$value); }
    
}