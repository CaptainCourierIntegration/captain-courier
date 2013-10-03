<?php

namespace CaptainCourier\CaptainBundle\Bridge\NormalityBridgeApi;

use Bond\Entity\Base;

class ParcelApiMapper
{
	public function getEntityType()
	{
		return "Parcel";
	}

	public function toApiObject(Base $parcel)
	{
		return json_decode(json_encode([
        	"id" => $parcel->getId(),
        	"type" => "Parcel",
        	"width" => $parcel->getWidth(),
        	"height" => $parcel->getHeight(),
        	"length" => $parcel->getLength(),
        	"weight" => $parcel->getWeight(),
        	"value" => $parcel->getValue()
        ]));
	}

}