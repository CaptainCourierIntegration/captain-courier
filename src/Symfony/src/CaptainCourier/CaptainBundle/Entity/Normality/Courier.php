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
 * Relation captain.Courier
 */
class Courier extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Courier';
    
    /**
     * Additional properties
     * @var array
     */
    protected static $additionalProperties = ['Services'];
    
    /**
     * Columns defined in captain.Courier
     * @var array
     */
    protected $data = array(
        'id' => null, # PK; is referenced by Service.courierId
        'name' => null,
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
    
    }
    
    /**
     * Get entity property
     * {@inheritDoc}
     */
    public function get( $key, $inputValidate = null, $source = null, \Bond\RecordManager\Task $task = null )
    {
        switch( $key ) {
    
            case 'Services':
                return $this->r()->referencesGet( $this, 'Service.courierId' );
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getId() { return $this->get('id'); }
    function getName() { return $this->get('name'); }
    
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
    
            case 'Services':
                return StaticMethods::set_references( $this, 'Service.courierId', $value );
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setId($value) { return $this->set('id',$value); }
    function setName($value) { return $this->set('name',$value); }
    
}