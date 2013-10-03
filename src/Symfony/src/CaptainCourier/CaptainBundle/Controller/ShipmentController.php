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
	private $addressApiMapper;
    private $parcelApiMapper;
    private $itemApiMapper;

	public function __construct(
        $d, 
        $entityManager, 
        $database, 
        $cidr, 
        $addressApiMapper, 
        $parcelApiMapper, 
        $itemApiMapper
    )
	{
		parent::__construct();
		$this->d = $d;
		$this->entityManager = $entityManager;
		$this->database = $database;
		$this->cidr = $cidr;
		$this->addressApiMapper = $addressApiMapper;
        $this->parcelAPiMapper = $parcelApiMapper;
        $this->itemApiMapper = $itemApiMapper;
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
			"to" => $this->addressApiMapper->toApiObject($deliveryAddress),
			"from" => $this->addressApiMapper->toApiObject($collectionAddress),
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