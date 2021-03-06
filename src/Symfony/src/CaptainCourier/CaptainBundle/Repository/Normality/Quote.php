<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Quote
 */
class Quote extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Quote';
    
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
        'id' => '["id","Quote","Quote.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_Quote_id\\"\'::regclass)"}]',
        'serviceId' => '["serviceId","Quote","Quote.serviceId",{"type":"int","isNullable":true,"entity":"normality","normality":"Service"}]',
        'quote' => '["quote","Quote","Quote.quote",{"type":"numeric"}]',
        'serviceCode' => '["serviceCode","Quote","Quote.serviceCode",{"type":"citext"}]',
        'collectionTimestamp' => '["collectionTimestamp","Quote","Quote.collectionTimestamp",{"type":"timestamp","entity":"DateTime"}]',
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
    protected $initialProperties = ['serviceId'];
    
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
    protected $references = '{"Recipt.quoteId":["Recipt","quoteId",1]}';
    
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
                    0 => 'quote',
                    1 => 'serviceCode',
                    2 => 'collectionTimestamp',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'serviceId',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}