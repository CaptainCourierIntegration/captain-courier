<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Recipt
 */
class Recipt extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Recipt';
    
    /**
     * API options from relation
     * @var array
     */
    protected $apiOptions = '[]';
    
    /**
     * Datatype information used by this entity. See, Bond\Entity\DataType
     * @var array
     */
    protected $dataTypes = [
        'id' => '["id","Recipt","Recipt.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_Recipt_id\\"\'::regclass)"}]',
        'quoteId' => '["quoteId","Recipt","Recipt.quoteId",{"type":"int","isNullable":true,"entity":"normality","normality":"Quote"}]',
        'contractNumber' => '["contractNumber","Recipt","Recipt.contractNumber",{"type":"citext"}]',
    ];
    
    /**
     * Form options from relation
     * @var array
     */
    protected $formOptions = '[]';
    
    /**
     * Initial properties to be stored by a entity.
     * @var array
     */
    protected $initialProperties = ['quoteId'];
    
    /**
     * Link information for this relation
     * @var array
     */
    protected $links = '[]';
    
    /**
     * Normality tags from relation
     * @var array
     */
    protected $normality = '[]';
    
    /**
     * Reference information for this relation
     * @var array
     */
    protected $references = '[]';
    
    /**
     * Options Resolver
     * @var array
     */
    private $resolver;
    
    /**
     * Resolver getter. Singleton
     * @return Symfony\Component\Options\Resolver
     */
    public function resolverGet()
    {
        // do we already have a resolver instance
        if( !$this->resolver ) {
    
            $resolver = new OptionsResolver();                        
            $resolver->setRequired(
                array(
                    0 => 'contractNumber',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'quoteId',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}