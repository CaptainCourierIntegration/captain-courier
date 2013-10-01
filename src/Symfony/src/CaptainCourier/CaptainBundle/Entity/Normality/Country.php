<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Entity\Base;
use Bond\Entity\StaticMethods;
use Bond\Repository;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\MaxLength;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Country
 */
class Country extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Country';
    
    /**
     * Additional properties
     * @var array
     */
    protected static $additionalProperties = ['Items', 'Addresss'];
    
    /**
     * Columns defined in captain.Country
     * @var array
     */
    protected $data = array(
        'cc' => null, # PK; is referenced by Item.originCountryCode, Address.cc
        'cc3' => null,
        'countryName' => null,
    );
    
    /**
     * Object properties which comprise this Entity's key.
     * @var array
     */
    protected static $keyProperties = ['cc'];
    
    /**
     * The property used for lateLoading
     * @var string
     */
    protected static $lateLoadProperty = 'cc';
    
    /**
     * Unsetable properties
     * @var array
     */
    protected static $unsetableProperties = [];
    
    /**
    * Symfony Validator Metadata.
    *
    * @param ClassMetadata $metadata
    * @return void
    */
    protected static function _loadValidatorMetadata( ClassMetadata $metadata )
    {
        $metadata->addPropertyConstraint(
            'cc',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'cc',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
        $metadata->addPropertyConstraint(
            'cc',
            new MaxLength(
                2
            )
        );
    
        $metadata->addPropertyConstraint(
            'cc3',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'cc3',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
        $metadata->addPropertyConstraint(
            'cc3',
            new MaxLength(
                3
            )
        );
    
        $metadata->addPropertyConstraint(
            'countryName',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'countryName',
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
    
            case 'Items':
                return $this->r()->referencesGet( $this, 'Item.originCountryCode' );
            
            case 'Addresss':
                return $this->r()->referencesGet( $this, 'Address.cc' );
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCc() { return $this->get('cc'); }
    function getCc3() { return $this->get('cc3'); }
    function getCountryName() { return $this->get('countryName'); }
    
    /**
     * Impementation of interface \Bond\Pg\Query->Validate()
     * @return scalar
     */
    public function parse( QuoteInterface $quoting )
    {
        return $quoting->quote( $this->data['cc'] );
    }
    
    /**
     * Set entity property
     * {@inheritDoc}
     */
    public function set( $key, $value = null, $inputValidate = null )
    {
        switch( $key ) {
    
            case 'Items':
                return StaticMethods::set_references( $this, 'Item.originCountryCode', $value );
            
            case 'Addresss':
                return StaticMethods::set_references( $this, 'Address.cc', $value );
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCc($value) { return $this->set('cc',$value); }
    function setCc3($value) { return $this->set('cc3',$value); }
    function setCountryName($value) { return $this->set('countryName',$value); }
    
}