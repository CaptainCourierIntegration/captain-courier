<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Country
 */
class Country extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Country';
    
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
        'cc' => '["cc","Country","Country.cc",{"type":"text","isPrimaryKey":true,"isUnique":true,"length":2}]',
        'cc3' => '["cc3","Country","Country.cc3",{"type":"text","length":3}]',
        'countryName' => '["countryName","Country","Country.countryName",{"type":"citext"}]',
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
    protected $references = '{"Address.cc":["Address","cc",1],"Item.originCountryCode":["Item","originCountryCode",1]}';
    
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
                    0 => 'cc',
                    1 => 'cc3',
                    2 => 'countryName',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}