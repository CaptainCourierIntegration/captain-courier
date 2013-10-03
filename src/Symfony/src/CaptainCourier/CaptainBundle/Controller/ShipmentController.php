<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

use Cidr\CidrRequest;
use Cidr\Model\Task;
use Cidr\CidrRequestContextCreateShipment;

class ShipmentController extends RestController
{ use NormalityAware;

	private $d;
	private $cidr;

	public function __construct($d, $entityManager, $database, $cidr)
	{
		parent::__construct();
		$this->d = $d;
		$this->entityManager = $entityManager;
		$this->database = $database;
		$this->cidr = $cidr;
	}

	// $this->entityManager->db;

	/**
	 *
	 * REQUESET
	 *   - *to
	 *   - *from
	 *   - *parcel
	 *   - *items
	 * 
	 * RESPONSE
	 *   - id
	 *   - type: Shipment
	 *   - to
	 *   - from
	 *   - parcel
	 *   - items
	 *
	 */
	public function createShipmentAction()
	{
		$data = json_decode($this->get("request")->getContent());

		$collectionAddress = $this->entityManager["Address"]->find($data->from);
		$deliveryAddress = $this->entityManager["Address"]->find($data->to);
		$parcel = $this->entityManager["Parcel"]->find($data->parcel);
		$items = array_map(
			function($id){return $this->entityManager["Item"]->find($id);}, 
			$data->items
		);
		d($parcel);

		$shipment = $this->persist(
			"Shipment",
			[
				"collectionAddressId" => $collectionAddress,
				"deliveryAddressId" => $deliveryAddress,
				"parcelId" => $parcel
			]
		);

		foreach($items as $item) {
			$itemLinkShipment = $this->persist(
				"ItemLinkShipment",
				[
					"itemId" => $item,
					"shipmentId" => $shipment
				]
			);
		}

		$toFormatted = [
             "name" => $deliveryAddress->getName(),
             "email" => $deliveryAddress->getEmail(),
             "line1" => $deliveryAddress->getLine1(),
             "postcode" => $deliveryAddress->getPostcode(),
             "cc" => $deliveryAddress->getCc(),
             "phone" => $deliveryAddress->getPhone(),
             "line2" => $deliveryAddress->getLine2(),
             "line3" => $deliveryAddress->getLine3()
        ];

   		$fromFormatted = [
             "name" => $collectionAddress->getName(),
             "email" => $collectionAddress->getEmail(),
             "line1" => $collectionAddress->getLine1(),
             "postcode" => $collectionAddress->getPostcode(),
             "cc" => $collectionAddress->getCc(),
             "phone" => $collectionAddress->getPhone(),
             "line2" => $collectionAddress->getLine2(),
             "line3" => $collectionAddress->getLine3()
        ];

        $parcelFormatted = [
        	"id" => $parcel->getId(),
        	"type" => "Parcel",
        	"width" => $parcel->getWidth(),
        	"height" => $parcel->getHeight(),
        	"length" => $parcel->getLength(),
        	"weight" => $parcel->getWeight(),
        	"value" => $parcel->getValue()
        ];

        $itemsFormatted = array_map(
        	function($item) {
        		return [
					"id" => $item->getId(),
					"type" => "Item",
					"description" => $item->getDescription(),
					"quantity" => $item->getQuantity(),
					"weight" => $item->getWeight(),
					"origin" => $item->getOriginCountryCode()->getCc(),
					"hsTarrifNumber" => $item->getHsTarrifNumber()
				];
        	},
        	$items
        );

		$shipmentFormatted = [
			"id" => $shipment->getId(),
			"type" => "Shipment",
			"to" => $toFormatted,
			"from" => $fromFormatted,
			"parcel" => $parcelFormatted,
			"items" => $itemsFormatted
		];

		return new Response(
			json_encode($shipmentFormatted),
			200,
			array('content-type' => 'application/json')
		);
	}

}