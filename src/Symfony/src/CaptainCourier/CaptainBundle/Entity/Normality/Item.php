<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Bridge\Normality\Constraint\RealInt;
use Bond\Entity\Base;
use Bond\Entity\StaticMethods;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Item
 */
class Item extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Item';
    
    /**
     * Columns defined in captain.Item
     * @var array
     */
    protected $data = array(
        'id' => null, # PK;
        'description' => null,
        'quantity' => null,
        'weight' => null,
        'originCountryCode' => null, # references Country.cc
        'hsTarrifNumber' => null,
        'createdTimestamp' => null,
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
            'description',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'description',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'quantity',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'quantity',
            new RealInt()
        );
    
        $metadata->addPropertyConstraint(
            'weight',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'weight',
            new RealInt()
        );
    
        $metadata->addPropertyConstraint(
            'originCountryCode',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Country',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'hsTarrifNumber',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'createdTimestamp',
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
    
            case 'Country':
                $key = 'originCountryCode';
                break;
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCreatedTimestamp() { return $this->get('createdTimestamp'); }
    function getDescription() { return $this->get('description'); }
    function getHsTarrifNumber() { return $this->get('hsTarrifNumber'); }
    function getId() { return $this->get('id'); }
    function getOriginCountryCode() { return $this->get('originCountryCode'); }
    function getQuantity() { return $this->get('quantity'); }
    function getWeight() { return $this->get('weight'); }
    
    /**
     * 'get' callback for $this->data['createdTimestamp']
     * @param mixed $value
     * @return DateTime
     */
    protected function get_createdTimestamp( &$value )
    {
        return StaticMethods::get_DateTime( $value );
    }
    
    /**
     * 'set' callback for $this->data['createdTimestamp']
     * @param mixed $value
     * @return DateTime
     */
    protected function set_createdTimestamp( $value, $inputValidate )
    {
        return StaticMethods::set_DateTime( $value, $inputValidate );
    }
    
    /**
     * 'get' callback for $this->data['originCountryCode']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Country
     */
    protected function get_originCountryCode( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Country', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['originCountryCode']
     * @param mixed $value
     * @return Country
     */
    protected function set_originCountryCode( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Country ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Country', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Country::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('originCountryCode');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Country');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Country::r()->make(); // old stylee
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
    
            case 'Country':
                $key = 'originCountryCode';
                break;
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCreatedTimestamp($value) { return $this->set('createdTimestamp',$value); }
    function setDescription($value) { return $this->set('description',$value); }
    function setHsTarrifNumber($value) { return $this->set('hsTarrifNumber',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setOriginCountryCode($value) { return $this->set('originCountryCode',$value); }
    function setQuantity($value) { return $this->set('quantity',$value); }
    function setWeight($value) { return $this->set('weight',$value); }
    
}