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
 * Relation captain.Authentication
 */
class Authentication extends RM
{    

    const PARENT = null;
    const TABLE = 'captain.Authentication';
    
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
        'id' => '["id","Authentication","Authentication.id",{"type":"int","isPrimaryKey":true,"isUnique":true,"default":"nextval(\'\\"seq_Authentication_id\\"\'::regclass)"}]',
        'hashType' => '["hashType","Authentication","Authentication.hashType",{"type":"hash","default":"\'SHA1\'::hash","enumName":"hash"}]',
        'hash' => '["hash","Authentication","Authentication.hash",{"type":"text"}]',
        'salt' => '["salt","Authentication","Authentication.salt",{"type":"text"}]',
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
    protected $references = '{"User.authenticationId":["User","authenticationId",1]}';
    
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
                    0 => 'hash',
                    1 => 'salt',
                )
            );                        
            $resolver->setOptional(
                array(
                    0 => 'id',
                    1 => 'hashType',
                )
            );
            $this->resolver = $resolver;
    
        }
        return $this->resolver;
    }
    
}