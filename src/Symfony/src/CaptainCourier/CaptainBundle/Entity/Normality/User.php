<?php

namespace CaptainCourier\CaptainBundle\Entity\Normality;

use Bond\Entity\Base;
use Bond\Sql\QuoteInterface;
use Bond\Sql\SqlInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.User
 */
class User extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/User';
    
    /**
     * Columns defined in captain.User
     * @var array
     */
    protected $data = array(
        'id' => null, # PK;
        'accountId' => null, # references Account.id
        'email' => null,
        'authenticationId' => null, # references Authentication.id
        'apiKey' => null,
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
            'accountId',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'accountId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Account',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'email',
            new NotNull()
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
            'authenticationId',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'authenticationId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Authentication',
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
        return ( null === $this->data['accountId'] ) or ( null === $this->data['authenticationId'] );
    }
    
    /**
     * Get entity property
     * {@inheritDoc}
     */
    public function get( $key, $inputValidate = null, $source = null, \Bond\RecordManager\Task $task = null )
    {
        switch( $key ) {
    
            case 'Account':
                $key = 'accountId';
                break;
            
            case 'Authentication':
                $key = 'authenticationId';
                break;
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getAccountId() { return $this->get('accountId'); }
    function getApiKey() { return $this->get('apiKey'); }
    function getAuthenticationId() { return $this->get('authenticationId'); }
    function getEmail() { return $this->get('email'); }
    function getId() { return $this->get('id'); }
    
    /**
     * 'get' callback for $this->data['accountId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Account
     */
    protected function get_accountId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Account', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['accountId']
     * @param mixed $value
     * @return Account
     */
    protected function set_accountId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Account ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Account', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Account::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('accountId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Account');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Account::r()->make(); // old stylee
            }
            $entity->set( $value, null, self::VALIDATE_STRIP );
            return $entity;
        }
        return null;
    }
    
    /**
     * 'get' callback for $this->data['authenticationId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Authentication
     */
    protected function get_authenticationId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Authentication', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['authenticationId']
     * @param mixed $value
     * @return Authentication
     */
    protected function set_authenticationId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Authentication ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Authentication', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Authentication::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('authenticationId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Authentication');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Authentication::r()->make(); // old stylee
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
    
            case 'Account':
                $key = 'accountId';
                break;
            
            case 'Authentication':
                $key = 'authenticationId';
                break;
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setAccountId($value) { return $this->set('accountId',$value); }
    function setApiKey($value) { return $this->set('apiKey',$value); }
    function setAuthenticationId($value) { return $this->set('authenticationId',$value); }
    function setEmail($value) { return $this->set('email',$value); }
    function setId($value) { return $this->set('id',$value); }
    
}