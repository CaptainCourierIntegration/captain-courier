<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Entity\Base;
use Bond\Entity\StaticMethods;
use Bond\Repository;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Account
 */
class Account extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Account';
    
    /**
     * Additional properties
     * @var array
     */
    protected static $additionalProperties = ['Users'];
    
    /**
     * Columns defined in captain.Account
     * @var array
     */
    protected $data = array(
        'id' => null, # PK; is referenced by User.accountId
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
    
            case 'Users':
                return $this->r()->referencesGet( $this, 'User.accountId' );
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getCreateTimestamp() { return $this->get('createTimestamp'); }
    function getId() { return $this->get('id'); }
    
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
    
            case 'Users':
                return StaticMethods::set_references( $this, 'User.accountId', $value );
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setCreateTimestamp($value) { return $this->set('createTimestamp',$value); }
    function setId($value) { return $this->set('id',$value); }
    
}