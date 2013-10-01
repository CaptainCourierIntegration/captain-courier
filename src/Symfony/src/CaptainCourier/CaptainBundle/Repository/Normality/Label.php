<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Label
 */
class Label extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Label';
    
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
        'id' => '["id","Label","Label.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_Label_id\\"\'::regclass)"}]',
        'resolution' => '["resolution","Label","Label.resolution",{"type":"int","isNullable":true}]',
        'size' => '["size","Label","Label.size",{"type":"citext","isNullable":true}]',
        'type' => '["type","Label","Label.type",{"type":"citext","isNullable":true}]',
        'pdfUri' => '["pdfUri","Label","Label.pdfUri",{"type":"text","isNullable":true}]',
        'createTimestamp' => '["createTimestamp","Label","Label.createTimestamp",{"type":"timestamp","isNullable":true,"default":"now()","entity":"DateTime"}]',
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
    protected $references = '{"Recipt.labelId":["Recipt","labelId",1]}';
    
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
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'resolution',
                    2 => 'size',
                    3 => 'type',
                    4 => 'pdfUri',
                    5 => 'createTimestamp',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}