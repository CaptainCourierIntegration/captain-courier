<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Entity\Base;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Recipt
 */
class Recipt extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Recipt';
    
    /**
     * Columns defined in captain.Recipt
     * @var array
     */
    protected $data = array(
        'id' => null, # PK;
        'shipmentId' => null, # references Shipment.id
        'labelId' => null, # references Label.id
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
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Shipment',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'labelId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Label',
                )
            )
        );
    
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
            
            case 'Label':
                $key = 'labelId';
                break;
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getId() { return $this->get('id'); }
    function getLabelId() { return $this->get('labelId'); }
    function getShipmentId() { return $this->get('shipmentId'); }
    
    /**
     * 'get' callback for $this->data['labelId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Label
     */
    protected function get_labelId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Label', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['labelId']
     * @param mixed $value
     * @return Label
     */
    protected function set_labelId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Label ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Label', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Label::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('labelId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Label');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Label::r()->make(); // old stylee
            }
            $entity->set( $value, null, self::VALIDATE_STRIP );
            return $entity;
        }
        return null;
    }
    
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
            
            case 'Label':
                $key = 'labelId';
                break;
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setId($value) { return $this->set('id',$value); }
    function setLabelId($value) { return $this->set('labelId',$value); }
    function setShipmentId($value) { return $this->set('shipmentId',$value); }
    
}