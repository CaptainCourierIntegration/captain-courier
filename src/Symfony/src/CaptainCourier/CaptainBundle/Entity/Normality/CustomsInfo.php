<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Bridge\Normality\Constraint\RealInt;
use Bond\Entity\Base;
use Bond\Entity\StaticMethods;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.CustomsInfo
 */
class CustomsInfo extends Base
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/CustomsInfo';
    
    /**
     * Columns defined in captain.CustomsInfo
     * @var array
     */
    protected $data = array(
        'id' => null,
        'contentType' => null,
        'contentsExplanation' => null,
        'customsCertify' => null,
        'customsSigner' => null,
        'nonDeliveryOption' => null,
        'restrictionType' => null,
        'restrictionComments' => null,
        'createdTimestamp' => null,
    );
    
    /**
     * The property used for lateLoading
     * @var string
     */
    protected static $lateLoadProperty = null;
    
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
            'id',
            new RealInt()
        );
    
        $metadata->addPropertyConstraint(
            'contentType',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'contentType',
            new Choice(
                array(
                    'choices' => 
                    array (
                        0 => 'documents',
                        1 => 'gift',
                        2 => 'merchandise',
                        3 => 'returned_goods',
                        4 => 'sample',
                        5 => 'other',
                    ),
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'contentsExplanation',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'customsCertify',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'customsCertify',
            new Type(
                array(
                    'type' => 'bool',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'customsSigner',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'nonDeliveryOption',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'nonDeliveryOption',
            new Choice(
                array(
                    'choices' => 
                    array (
                        0 => 'abandon',
                        1 => 'return',
                    ),
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'restrictionType',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'restrictionType',
            new Choice(
                array(
                    'choices' => 
                    array (
                        0 => 'none',
                        1 => 'other',
                        2 => 'quarantine',
                        3 => 'sanitary_phytosanitary_inspection',
                    ),
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'restrictionComments',
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
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getContentType() { return $this->get('contentType'); }
    function getContentsExplanation() { return $this->get('contentsExplanation'); }
    function getCreatedTimestamp() { return $this->get('createdTimestamp'); }
    function getCustomsCertify() { return $this->get('customsCertify'); }
    function getCustomsSigner() { return $this->get('customsSigner'); }
    function getId() { return $this->get('id'); }
    function getNonDeliveryOption() { return $this->get('nonDeliveryOption'); }
    function getRestrictionComments() { return $this->get('restrictionComments'); }
    function getRestrictionType() { return $this->get('restrictionType'); }
    
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
     * 'get' callback for $this->data['customsCertify']
     * @param mixed
     * @return bool
     */
    protected function get_customsCertify( &$value )
    {
        return \Bond\boolval( $value );
    }
    
    /**
     * 'set' callback for $this->data['customsCertify']
     * @param mixed $value
     * @return bool
     */
    protected function set_customsCertify( $value )
    {
        return $value;
    }
    
    /**
     * Impementation of interface \Bond\Pg\Query->Validate()
     * @return scalar
     */
    public function parse( QuoteInterface $quoting )
    {
        throw new \LogicException('Normality can\'t (yet) handle tables without a primary key or multi-column primary keys.\nPlease extend the generator or overload CustomsInfo->parse().');
    }
    
    /**
     * Set entity property
     * {@inheritDoc}
     */
    public function set( $key, $value = null, $inputValidate = null )
    {
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setContentType($value) { return $this->set('contentType',$value); }
    function setContentsExplanation($value) { return $this->set('contentsExplanation',$value); }
    function setCreatedTimestamp($value) { return $this->set('createdTimestamp',$value); }
    function setCustomsCertify($value) { return $this->set('customsCertify',$value); }
    function setCustomsSigner($value) { return $this->set('customsSigner',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setNonDeliveryOption($value) { return $this->set('nonDeliveryOption',$value); }
    function setRestrictionComments($value) { return $this->set('restrictionComments',$value); }
    function setRestrictionType($value) { return $this->set('restrictionType',$value); }
    
}