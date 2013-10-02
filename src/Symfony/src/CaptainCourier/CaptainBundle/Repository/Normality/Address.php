<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.Address
 */
class Address extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Address';
    
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
        'id' => '["id","Address","Address.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_Address_id\\"\'::regclass)"}]',
        'companyName' => '["companyName","Address","Address.companyName",{"type":"citext","isNullable":true}]',
        'name' => '["name","Address","Address.name",{"type":"citext","isNullable":true}]',
        'phone' => '["phone","Address","Address.phone",{"type":"citext","isNullable":true}]',
        'email' => '["email","Address","Address.email",{"type":"citext","isNullable":true}]',
        'line1' => '["line1","Address","Address.line1",{"type":"citext"}]',
        'line2' => '["line2","Address","Address.line2",{"type":"citext","isNullable":true}]',
        'line3' => '["line3","Address","Address.line3",{"type":"citext","isNullable":true}]',
        'line4' => '["line4","Address","Address.line4",{"type":"citext","isNullable":true}]',
        'line5' => '["line5","Address","Address.line5",{"type":"citext","isNullable":true}]',
        'town' => '["town","Address","Address.town",{"type":"citext","isNullable":true}]',
        'county' => '["county","Address","Address.county",{"type":"citext","isNullable":true}]',
        'postcode' => '["postcode","Address","Address.postcode",{"type":"citext"}]',
        'cc' => '["cc","Address","Address.cc",{"type":"text","length":2,"entity":"normality","normality":"Country"}]',
        'createdTimestamp' => '["createdTimestamp","Address","Address.createdTimestamp",{"type":"timestamp","isNullable":true,"default":"now()","entity":"DateTime"}]',
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
    protected $initialProperties = ['cc'];
    
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
    protected $references = '{"Shipment.collectionAddressId":["Shipment","collectionAddressId",1],"Shipment.deliveryAddressId":["Shipment","deliveryAddressId",1]}';
    
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
                    0 => 'line1',
                    1 => 'postcode',
                    2 => 'cc',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'companyName',
                    2 => 'name',
                    3 => 'phone',
                    4 => 'email',
                    5 => 'line2',
                    6 => 'line3',
                    7 => 'line4',
                    8 => 'line5',
                    9 => 'town',
                    10 => 'county',
                    11 => 'createdTimestamp',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}