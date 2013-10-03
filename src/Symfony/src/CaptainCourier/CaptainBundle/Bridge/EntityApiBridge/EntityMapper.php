<?php

namespace CaptainCourier\CaptainBundle\Bridge\NormalityBridgeApi;

use Bond\Entity\Base;

interface EntityMapper
{
	/** 
	 *
	 * @return string name of type such as 'Address' or 'Person'. typically cananocial name of class.
	 */
	public function getEntityType();


	public function toApiObject(Base $entity);

}