<?php

namespace CaptainCourier\CaptainBundle\Repository\Normality;

use Symfony\Component\OptionsResolver\OptionsResolver;
use \Bond\Repository\Multiton as RM;

/**
 * ConnectionInfo captain@captain:localhost,
 * Relation captain.User
 */
class User extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.User';
    
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
        'id' => '["id","User","User.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_User_id\\"\'::regclass)"}]',
        'accountId' => '["accountId","User","User.accountId",{"type":"int","entity":"normality","normality":"Account"}]',
        'email' => '["email","User","User.email",{"type":"text","isUnique":true}]',
        'authenticationId' => '["authenticationId","User","User.authenticationId",{"type":"int","entity":"normality","normality":"Authentication"}]',
        'apiKey' => '["apiKey","User","User.apiKey",{"type":"uuid","default":"uuid_generate_v4()"}]',
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
    protected $initialProperties = ['accountId', 'authenticationId'];
    
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
                    0 => 'accountId',
                    1 => 'email',
                    2 => 'authenticationId',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'apiKey',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}