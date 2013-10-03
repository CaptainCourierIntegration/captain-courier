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
 * Relation captain.Address
 */
class Address extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Address';
    
    /**
     * Additional properties
     * @var array
     */
    protected static $additionalProperties = ['Shipments', 'Shipments'];
    
    /**
     * Columns defined in captain.Address
     * @var array
     */
    protected $data = array(
        'id' => null, # PK; is referenced by Shipment.deliveryAddressId, Shipment.collectionAddressId
        'companyName' => null,
        'name' => null,
        'phone' => null,
        'email' => null,
        'line1' => null,
        'line2' => null,
        'line3' => null,
        'line4' => null,
        'line5' => null,
        'town' => null,
        'county' => null,
        'postcode' => null,
        'cc' => null, # references Country.cc
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
            'companyName',
            new Type(
                array(
                    'type' => 'string',
                )
            )
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
            'phone',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'email',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'line1',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'line1',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'line2',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'line3',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'line4',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'line5',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'town',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'county',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'postcode',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'postcode',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'cc',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'cc',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Country',
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
     * Is a zombie object?
     * @inheritDoc
     */
    public function isZombie()
    {
        return ( null === $this->data['cc'] );
    }
    
    /**
     * Get entity property
     * {@inheritDoc}
     */
    public function get( $key, $inputValidate = null, $source = null, \Bond\RecordManager\Task $task = null )
    {
        switch( $key ) {
    
            case 'Country':
                $key = 'cc';
                break;
            
            case 'Shipments':
                return $this->r()->referencesGet( $this, 'Shipment.deliveryAddressId' );
            
            case 'Shipments':
                return $this->r()->referencesGet( $this, 'Shipment.collectionAddressId' );
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCc() { return $this->get('cc'); }
    function getCompanyName() { return $this->get('companyName'); }
    function getCounty() { return $this->get('county'); }
    function getCreatedTimestamp() { return $this->get('createdTimestamp'); }
    function getEmail() { return $this->get('email'); }
    function getId() { return $this->get('id'); }
    function getLine1() { return $this->get('line1'); }
    function getLine2() { return $this->get('line2'); }
    function getLine3() { return $this->get('line3'); }
    function getLine4() { return $this->get('line4'); }
    function getLine5() { return $this->get('line5'); }
    function getName() { return $this->get('name'); }
    function getPhone() { return $this->get('phone'); }
    function getPostcode() { return $this->get('postcode'); }
    function getTown() { return $this->get('town'); }
    
    /**
     * 'get' callback for $this->data['cc']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Country
     */
    protected function get_cc( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Country', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['cc']
     * @param mixed $value
     * @return Country
     */
    protected function set_cc( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Country ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Country', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Country::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('cc');
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
                $key = 'cc';
                break;
            
            case 'Shipments':
                return StaticMethods::set_references( $this, 'Shipment.deliveryAddressId', $value );
            
            case 'Shipments':
                return StaticMethods::set_references( $this, 'Shipment.collectionAddressId', $value );
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCc($value) { return $this->set('cc',$value); }
    function setCompanyName($value) { return $this->set('companyName',$value); }
    function setCounty($value) { return $this->set('county',$value); }
    function setCreatedTimestamp($value) { return $this->set('createdTimestamp',$value); }
    function setEmail($value) { return $this->set('email',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setLine1($value) { return $this->set('line1',$value); }
    function setLine2($value) { return $this->set('line2',$value); }
    function setLine3($value) { return $this->set('line3',$value); }
    function setLine4($value) { return $this->set('line4',$value); }
    function setLine5($value) { return $this->set('line5',$value); }
    function setName($value) { return $this->set('name',$value); }
    function setPhone($value) { return $this->set('phone',$value); }
    function setPostcode($value) { return $this->set('postcode',$value); }
    function setTown($value) { return $this->set('town',$value); }
    
}