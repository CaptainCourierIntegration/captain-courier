<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Entity\Base;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Parcel
 */
class Parcel extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Parcel';
    
    /**
     * Columns defined in captain.Parcel
     * @var array
     */
    protected $data = array(
        'id' => null, # PK;
        'width' => null,
        'height' => null,
        'length' => null,
        'weight' => null,
        'value' => null,
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
            'width',
            new NotNull()
        );
    
        $metadata->addPropertyConstraint(
            'height',
            new NotNull()
        );
    
        $metadata->addPropertyConstraint(
            'length',
            new NotNull()
        );
    
        $metadata->addPropertyConstraint(
            'weight',
            new NotNull()
        );
    
        $metadata->addPropertyConstraint(
            'value',
            new NotNull()
        );
    
    }
    
    /**
     * Get entity property
     * {@inheritDoc}
     */
    public function get( $key, $inputValidate = null, $source = null, \Bond\RecordManager\Task $task = null )
    {
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getHeight() { return $this->get('height'); }
    function getId() { return $this->get('id'); }
    function getLength() { return $this->get('length'); }
    function getValue() { return $this->get('value'); }
    function getWeight() { return $this->get('weight'); }
    function getWidth() { return $this->get('width'); }
    
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
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setHeight($value) { return $this->set('height',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setLength($value) { return $this->set('length',$value); }
    function setValue($value) { return $this->set('value',$value); }
    function setWeight($value) { return $this->set('weight',$value); }
    function setWidth($value) { return $this->set('width',$value); }
    
}