<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class ShipmentController extends RestController
{

	private $d;
	private $entityManager;
	private $database;

	public function __construct($d, $entityManager, $database)
	{
		parent::__construct();
		$this->d = $d;
		$this->entityManager = $entityManager;
		$this->database = $database;
	}

	/**
	 *
	 *
	 * REQUESET
	 *   - toId
	 *   - fromId
	 *   - parcelId
	 *   - itemsIds
	 * 
	 * RESPONSE
	 *   - id
	 *   - type: Shipment
	 *   - toAddress
	 *   - fromAddress
	 *   - parcel
	 *   - items
	 */
	public function createShipmentAction()
	{
		$data = json_decode($this->get("request")->getContent());

		return new Response(
			json_encode($data),
			200,
			array('content-type' => 'application/json')
		);
	}

}