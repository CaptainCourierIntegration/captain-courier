<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Bridge\Normality\Constraint\RealInt;
use Bond\Entity\Base;
use Bond\Entity\StaticMethods;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.ItemLinkShipment
 */
class ItemLinkShipment extends Base
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/ItemLinkShipment';
    
    /**
     * Columns defined in captain.ItemLinkShipment
     * @var array
     */
    protected $data = array(
        'itemId' => null, # PK;
        'shipmentId' => null, # PK;
        'createTimestamp' => null,
    );
    
    /**
     * Object properties which comprise this Entity's key.
     * @var array
     */
    protected static $keyProperties = ['itemId', 'shipmentId'];
    
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
            'itemId',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'itemId',
            new RealInt()
        );
    
        $metadata->addPropertyConstraint(
            'shipmentId',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'shipmentId',
            new RealInt()
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
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCreateTimestamp() { return $this->get('createTimestamp'); }
    function getItemId() { return $this->get('itemId'); }
    function getShipmentId() { return $this->get('shipmentId'); }
    
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
        throw new \LogicException('Normality can\'t (yet) handle tables without a primary key or multi-column primary keys.\nPlease extend the generator or overload ItemLinkShipment->parse().');
    }
    
    /**
     * Set entity property
     * {@inheritDoc}
     */
    public function set( $key, $value = null, $inputValidate = null )
    {
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCreateTimestamp($value) { return $this->set('createTimestamp',$value); }
    function setItemId($value) { return $this->set('itemId',$value); }
    function setShipmentId($value) { return $this->set('shipmentId',$value); }
    
}