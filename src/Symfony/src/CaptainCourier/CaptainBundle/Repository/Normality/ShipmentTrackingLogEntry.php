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
 * Relation captain.ShipmentTrackingLogEntry
 */
class ShipmentTrackingLogEntry extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.ShipmentTrackingLogEntry';
    
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
        'id' => '["id","ShipmentTrackingLogEntry","ShipmentTrackingLogEntry.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_ShipmentTrackingLogEntry_id\\"\'::regclass)"}]',
        'shipmentTrackingLogId' => '["shipmentTrackingLogId","ShipmentTrackingLogEntry","ShipmentTrackingLogEntry.shipmentTrackingLogId",{"type":"int","entity":"normality","normality":"ShipmentTrackingLog"}]',
        'status' => '["status","ShipmentTrackingLogEntry","ShipmentTrackingLogEntry.status",{"type":"citext"}]',
        'timestamp' => '["timestamp","ShipmentTrackingLogEntry","ShipmentTrackingLogEntry.timestamp",{"type":"timestamp","default":"now()","entity":"DateTime"}]',
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
    protected $initialProperties = ['shipmentTrackingLogId'];
    
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
                    0 => 'shipmentTrackingLogId',
                    1 => 'status',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'timestamp',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}