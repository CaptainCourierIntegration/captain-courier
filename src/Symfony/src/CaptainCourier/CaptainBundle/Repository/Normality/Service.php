<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Service
 */
class Service extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Service';
    
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
        'id' => '["id","Service","Service.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_Service_id\\"\'::regclass)"}]',
        'courierId' => '["courierId","Service","Service.courierId",{"type":"int","isNullable":true,"entity":"normality","normality":"Courier"}]',
        'name' => '["name","Service","Service.name",{"type":"citext"}]',
        'serviceCode' => '["serviceCode","Service","Service.serviceCode",{"type":"text","isUnique":true}]',
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
    protected $initialProperties = ['courierId'];
    
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
    protected $references = '{"Quote.serviceId":["Quote","serviceId",1]}';
    
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
                    0 => 'name',
                    1 => 'serviceCode',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'courierId',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}