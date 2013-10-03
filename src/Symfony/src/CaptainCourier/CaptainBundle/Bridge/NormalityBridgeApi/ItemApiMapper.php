<?php

namespace CaptainCourier\CaptainBundle\Bridge\NormalityBridgeApi;

use Bond\Entity\Base;

class ItemApiMapper
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
			"description" => $this->getDescription(),
			"quantity" => $this->getQuantity(),
			"weight" => $this->getWeight(),
			"origin" => $this->getOriginCountryCode()->getCc(),
			"hsTarrifNumber" => $this->getHsTarrifNumber()
        ]));
	}


}