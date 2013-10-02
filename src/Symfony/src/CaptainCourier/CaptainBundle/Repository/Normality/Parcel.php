<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Parcel
 */
class Parcel extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Parcel';
    
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
        'id' => '["id","Parcel","Parcel.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_Parcel_id\\"\'::regclass)"}]',
        'width' => '["width","Parcel","Parcel.width",{"type":"numeric"}]',
        'height' => '["height","Parcel","Parcel.height",{"type":"numeric"}]',
        'length' => '["length","Parcel","Parcel.length",{"type":"numeric"}]',
        'weight' => '["weight","Parcel","Parcel.weight",{"type":"numeric"}]',
        'value' => '["value","Parcel","Parcel.value",{"type":"numeric"}]',
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
    protected $initialProperties = [];
    
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
                    0 => 'width',
                    1 => 'height',
                    2 => 'length',
                    3 => 'weight',
                    4 => 'value',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}