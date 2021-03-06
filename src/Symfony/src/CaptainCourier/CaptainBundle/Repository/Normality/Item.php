<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Item
 */
class Item extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Item';
    
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
        'id' => '["id","Item","Item.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_Item_id\\"\'::regclass)"}]',
        'description' => '["description","Item","Item.description",{"type":"citext"}]',
        'quantity' => '["quantity","Item","Item.quantity",{"type":"int"}]',
        'weight' => '["weight","Item","Item.weight",{"type":"int"}]',
        'originCountryCode' => '["originCountryCode","Item","Item.originCountryCode",{"type":"text","isNullable":true,"length":2,"entity":"normality","normality":"Country"}]',
        'hsTarrifNumber' => '["hsTarrifNumber","Item","Item.hsTarrifNumber",{"type":"citext","isNullable":true}]',
        'createdTimestamp' => '["createdTimestamp","Item","Item.createdTimestamp",{"type":"timestamp","isNullable":true,"default":"now()","entity":"DateTime"}]',
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
    protected $initialProperties = ['originCountryCode'];
    
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
                    0 => 'description',
                    1 => 'quantity',
                    2 => 'weight',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'originCountryCode',
                    2 => 'hsTarrifNumber',
                    3 => 'createdTimestamp',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}