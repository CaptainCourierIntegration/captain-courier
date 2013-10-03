<?php

namespace CaptainCourier\CaptainBundle\Bridge\NormalityBridgeApi;

use Bond\Entity\Base;

class AddressMapper
{
	public function getEntityType()
	{
		return "Address";
	}

	public function toApiObject(Base $address)
	{
		return json_decode(json_encode([
			"id" => $address->getId(),
			"type" => $this->getEntityType(),
			"name" => $address->getName(),
			"phone" => $address->getPhone(),
			"email" => $address->getEmail(),
			"line1" => $address->getLine1(),
			"line2" => $address->getLine2(),
			"line3" => $address->getLine3(),
			"line4" => $address->getLine4(),
			"line5" => $address->getLine5(),
			"town" => $address->getTown(),
			"county" => $address->getCounty(),
			"postcode" => $address->getPostcode(),
			"cc" => $address->getCc()->getCc(),
			"phone" => $address->getPhone()
        ]));
	}


}