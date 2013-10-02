<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.CustomsInfo
 */
class CustomsInfo extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.CustomsInfo';
    
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
        'id' => '["id","CustomsInfo","CustomsInfo.id",{"type":"int","default":"nextval(\'\\"seq_CustomsInfo_id\\"\'::regclass)"}]',
        'contentType' => '["contentType","CustomsInfo","CustomsInfo.contentType",{"type":"customsinfo_content_type","enumName":"customsinfo_content_type"}]',
        'contentsExplanation' => '["contentsExplanation","CustomsInfo","CustomsInfo.contentsExplanation",{"type":"citext","isNullable":true}]',
        'customsCertify' => '["customsCertify","CustomsInfo","CustomsInfo.customsCertify",{"type":"bool"}]',
        'customsSigner' => '["customsSigner","CustomsInfo","CustomsInfo.customsSigner",{"type":"citext","isNullable":true}]',
        'nonDeliveryOption' => '["nonDeliveryOption","CustomsInfo","CustomsInfo.nonDeliveryOption",{"type":"customsinfo_non_delivery_option","enumName":"customsinfo_non_delivery_option"}]',
        'restrictionType' => '["restrictionType","CustomsInfo","CustomsInfo.restrictionType",{"type":"customsinfo_restriction_type","enumName":"customsinfo_restriction_type"}]',
        'restrictionComments' => '["restrictionComments","CustomsInfo","CustomsInfo.restrictionComments",{"type":"citext","isNullable":true}]',
        'createdTimestamp' => '["createdTimestamp","CustomsInfo","CustomsInfo.createdTimestamp",{"type":"timestamp","isNullable":true,"default":"now()","entity":"DateTime"}]',
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
                    0 => 'contentType',
                    1 => 'customsCertify',
                    2 => 'nonDeliveryOption',
                    3 => 'restrictionType',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'contentsExplanation',
                    2 => 'customsSigner',
                    3 => 'restrictionComments',
                    4 => 'createdTimestamp',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}