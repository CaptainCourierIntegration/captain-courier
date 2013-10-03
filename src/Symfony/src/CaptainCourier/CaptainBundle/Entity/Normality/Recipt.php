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
 * Relation captain.Recipt
 */
class Recipt extends Base implements SqlInterface
{    

    /**
     * Entity FileStore directory
     */
    const ENTITY_FILESTORE = '/home/captain/CaptainCourier/captain-courier/src/Symfony/src/CaptainCourier/CaptainBundle/EntityFileStore/Recipt';
    
    /**
     * Columns defined in captain.Recipt
     * @var array
     */
    protected $data = array(
        'id' => null, # PK;
        'quoteId' => null, # references Quote.id
        'contractNumber' => null,
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
            'quoteId',
            new Type(
                array(
                    'type' => 'CaptainCourier\\CaptainBundle\\Entity\\Quote',
                )
            )
        );
    
        $metadata->addPropertyConstraint(
            'contractNumber',
            new NotNull()
        );
        $metadata->addPropertyConstraint(
            'contractNumber',
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
    
            case 'Quote':
                $key = 'quoteId';
                break;
            
        }
        return parent::get( $key, $inputValidate, $source, $task );
    }
    
    function getContractNumber() { return $this->get('contractNumber'); }
    function getId() { return $this->get('id'); }
    function getQuoteId() { return $this->get('quoteId'); }
    
    /**
     * 'get' callback for $this->data['quoteId']
     * @param scalar
     * @return \CaptainCourier\CaptainBundle\Entity\Quote
     */
    protected function get_quoteId( &$value )
    {
        if( !is_object( $value ) ) {
            $value = $this->entityManager->find( '\CaptainCourier\CaptainBundle\Entity\Quote', $value );
        }
        return $value;
    }
    
    /**
     * 'set' callback for $this->data['quoteId']
     * @param mixed $value
     * @return Quote
     */
    protected function set_quoteId( $value )
    {
        if( $value instanceof \CaptainCourier\CaptainBundle\Entity\Quote ) {
            return $value;
        } elseif( is_scalar( $value ) ) {
            return $this->entityManager->find('\CaptainCourier\CaptainBundle\Entity\Quote', $value);
            // return \CaptainCourier\CaptainBundle\Entity\Quote::r()->find( $value ); // old stylee
        } elseif( is_array( $value ) ) {
            $entity = $this->get('quoteId');
            if( !$entity ) {
                return $this->entityManager->make('\CaptainCourier\CaptainBundle\Entity\Quote');
                // $entity = \CaptainCourier\CaptainBundle\Entity\Quote::r()->make(); // old stylee
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
    
            case 'Quote':
                $key = 'quoteId';
                break;
            
        }
        return parent::set( $key, $value, $inputValidate );
    }
    
    function setContractNumber($value) { return $this->set('contractNumber',$value); }
    function setId($value) { return $this->set('id',$value); }
    function setQuoteId($value) { return $this->set('quoteId',$value); }
    
}