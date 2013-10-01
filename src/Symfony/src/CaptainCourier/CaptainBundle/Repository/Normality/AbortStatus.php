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
 * Relation captain.AbortStatus
 */
class AbortStatus extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.AbortStatus';
    
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
        'id' => '["id","AbortStatus","AbortStatus.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_AbortStatus_id\\"\'::regclass)"}]',
        'shipmentId' => '["shipmentId","AbortStatus","AbortStatus.shipmentId",{"type":"int","entity":"normality","normality":"Shipment"}]',
        'status' => '["status","AbortStatus","AbortStatus.status",{"type":"abortstatus_status","enumName":"abortstatus_status"}]',
        'message' => '["message","AbortStatus","AbortStatus.message",{"type":"citext","isNullable":true}]',
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
    protected $initialProperties = ['shipmentId'];
    
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
                    0 => 'shipmentId',
                    1 => 'status',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'message',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}