<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Bridge\Normality\Constraint\RealInt;
use Bond\Entity\Base;
use Bond\Entity\StaticMethods;
use Bond\Repository;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Label
 */
class Label extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Label';
    
    /**
     * Additional properties
     * @var array
     */
    protected static $additionalProperties = ['Recipts'];
    
    /**
     * Columns defined in captain.Label
     * @var array
     */
    protected $data = array(
        'id' => null, # PK; is referenced by Recipt.labelId
        'resolution' => null,
        'size' => null,
        'type' => null,
        'pdfUri' => null,
        'createTimestamp' => null,
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
            'resolution',
            new RealInt()
        );
    
        $metadata->addPropertyConstraint(
            'size',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'type',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'pdfUri',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'createTimestamp',
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
    
            case 'Recipts':
                return $this->r()->referencesGet( $this, 'Recipt.labelId' );
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCreateTimestamp() { return $this->get('createTimestamp'); }
    function getId() { return $this->get('id'); }
    function getPdfUri() { return $this->get('pdfUri'); }
    function getResolution() { return $this->get('resolution'); }
    function getSize() { return $this->get('size'); }
    function getType() { return $this->get('type'); }
    
    /**
     * 'get' callback for $this->data['createTimestamp']
     * @param mixed $value
     * @return DateTime
     */
    protected function get_createTimestamp( &$value )
    {
        return StaticMethods::get_DateTime( $value );
    }
    
    /**
     * 'set' callback for $this->data['createTimestamp']
     * @param mixed $value
     * @return DateTime
     */
    protected function set_createTimestamp( $value, $inputValidate )
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
    
            case 'Recipts':
                return StaticMethods::set_references( $this, 'Recipt.labelId', $value );
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCreateTimestamp($value) { return $this->set('createTimestamp',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setPdfUri($value) { return $this->set('pdfUri',$value); }
    function setResolution($value) { return $this->set('resolution',$value); }
    function setSize($value) { return $this->set('size',$value); }
    function setType($value) { return $this->set('type',$value); }
    
}