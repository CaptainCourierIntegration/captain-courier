<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Entity\Base;
use Bond\Entity\StaticMethods;
use Bond\Repository;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Authentication
 */
class Authentication extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Authentication';
    
    /**
     * Additional properties
     * @var array
     */
    protected static $additionalProperties = ['Users'];
    
    /**
     * Columns defined in captain.Authentication
     * @var array
     */
    protected $data = array(
        'id' => null, # PK; is referenced by User.authenticationId
        'hashType' => null,
        'hash' => null,
        'salt' => null,
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
            'hashType',
            new Choice(
                array(
                    'choices' => 
                    array (
                        0 => 'MD5',
                        1 => 'SHA1',
                        2 => 'SHA256',
                    ),
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'hash',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'hash',
            new Type(
                array(
                    'type' => 'string',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'salt',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'salt',
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
    
            case 'Users':
                return $this->r()->referencesGet( $this, 'User.authenticationId' );
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getHash() { return $this->get('hash'); }
    function getHashType() { return $this->get('hashType'); }
    function getId() { return $this->get('id'); }
    function getSalt() { return $this->get('salt'); }
    
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
                return StaticMethods::set_references( $this, 'User.authenticationId', $value );
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setHash($value) { return $this->set('hash',$value); }
    function setHashType($value) { return $this->set('hashType',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setSalt($value) { return $this->set('salt',$value); }
    
}