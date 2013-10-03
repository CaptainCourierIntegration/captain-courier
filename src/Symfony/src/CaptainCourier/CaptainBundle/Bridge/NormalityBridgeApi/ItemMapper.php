<?php

namespace CaptainCourier\CaptainBundle\Bridge\NormalityBridgeApi;

use Bond\Entity\Base;

class ItemMapper
{
	public function getEntityType()
	{
		return "Item";
	}

	public function toApiObject(Base $item)
	{
		return json_decode(json_encode([
			"id" => $item->getId(),
			"type" => $this->getEntityType(),
			"description" => $item->getDescription(),
			"quantity" => $item->getQuantity(),
			"weight" => $item->getWeight(),
			"origin" => $item->getOriginCountryCode()->getCc(),
			"hsTarrifNumber" => $item->getHsTarrifNumber()
        ]));
	}


}