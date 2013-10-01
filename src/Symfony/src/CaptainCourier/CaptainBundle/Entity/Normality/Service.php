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
 * Relation captain.Service
 */
class Service extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Service';
    
    /**
     * Additional properties
     * @var array
     */
    protected static $additionalProperties = ['Quotes'];
    
    /**
     * Columns defined in captain.Service
     * @var array
     */
    protected $data = array(
        'id' => null, # PK; is referenced by Quote.serviceId
        'courierId' => null, # references Courier.id
        'name' => null,
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
            'courierId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Courier',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'name',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'name',
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
     * Get entity property
     * {@inheritDoc}
     */
    public function get( $key, $inputValidate = null, $source = null, \Bond\RecordManager\Task $task = null )
    {
        switch( $key ) {
    
            case 'Courier':
                $key = 'courierId';
                break;
            
            case 'Quotes':
                return $this->r()->referencesGet( $this, 'Quote.serviceId' );
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCourierId() { return $this->get('courierId'); }
    function getId() { return $this->get('id'); }
    function getName() { return $this->get('name'); }
    function getServiceCode() { return $this->get('serviceCode'); }
    
    /**
     * 'get' callback for $this->data['courierId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Courier
     */
    protected function get_courierId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Courier', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['courierId']
     * @param mixed $value
     * @return Courier
     */
    protected function set_courierId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Courier ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Courier', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Courier::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('courierId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Courier');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Courier::r()->make(); // old stylee
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
    
            case 'Courier':
                $key = 'courierId';
                break;
            
            case 'Quotes':
                return StaticMethods::set_references( $this, 'Quote.serviceId', $value );
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCourierId($value) { return $this->set('courierId',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setName($value) { return $this->set('name',$value); }
    function setServiceCode($value) { return $this->set('serviceCode',$value); }
    
}