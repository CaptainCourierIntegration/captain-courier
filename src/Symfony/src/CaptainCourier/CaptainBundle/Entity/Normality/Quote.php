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
 * Relation captain.Quote
 */
class Quote extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Quote';
    
    /**
     * Columns defined in captain.Quote
     * @var array
     */
    protected $data = array(
        'id' => null, # PK;
        'serviceId' => null, # references Service.id
        'quote' => null,
        'collectionTimestamp' => null,
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
            'serviceId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Service',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'quote',
            new NotNull()
        );
    
        $metadata->addPropertyConstraint(
            'collectionTimestamp',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'collectionTimestamp',
            new Type(
                array(
                    'type' => 'Bond\\Entity\\Types\\DateTime',
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
    
            case 'Service':
                $key = 'serviceId';
                break;
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCollectionTimestamp() { return $this->get('collectionTimestamp'); }
    function getId() { return $this->get('id'); }
    function getQuote() { return $this->get('quote'); }
    function getServiceId() { return $this->get('serviceId'); }
    
    /**
     * 'get' callback for $this->data['collectionTimestamp']
     * @param mixed $value
     * @return DateTime
     */
    protected function get_collectionTimestamp( &$value )
    {
        return StaticMethods::get_DateTime( $value );
    }
    
    /**
     * 'set' callback for $this->data['collectionTimestamp']
     * @param mixed $value
     * @return DateTime
     */
    protected function set_collectionTimestamp( $value, $inputValidate )
    {
        return StaticMethods::set_DateTime( $value, $inputValidate );
    }
    
    /**
     * 'get' callback for $this->data['serviceId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Service
     */
    protected function get_serviceId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Service', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['serviceId']
     * @param mixed $value
     * @return Service
     */
    protected function set_serviceId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Service ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Service', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Service::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('serviceId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Service');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Service::r()->make(); // old stylee
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
    
            case 'Service':
                $key = 'serviceId';
                break;
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCollectionTimestamp($value) { return $this->set('collectionTimestamp',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setQuote($value) { return $this->set('quote',$value); }
    function setServiceId($value) { return $this->set('serviceId',$value); }
    
}