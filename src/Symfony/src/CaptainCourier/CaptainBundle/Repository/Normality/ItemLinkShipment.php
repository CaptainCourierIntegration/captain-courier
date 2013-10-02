<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.ItemLinkShipment
 */
class ItemLinkShipment extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.ItemLinkShipment';
    
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
        'itemId' => '["itemId","ItemLinkShipment","ItemLinkShipment.itemId",{"type":"int","isPrimaryKey":true}]',
        'shipmentId' => '["shipmentId","ItemLinkShipment","ItemLinkShipment.shipmentId",{"type":"int","isPrimaryKey":true}]',
        'createTimestamp' => '["createTimestamp","ItemLinkShipment","ItemLinkShipment.createTimestamp",{"type":"timestamp","default":"now()","entity":"DateTime"}]',
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
                    0 => 'itemId',
                    1 => 'shipmentId',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'createTimestamp',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}