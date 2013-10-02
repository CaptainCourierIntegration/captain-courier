<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Bond\Sql\Query;
use Bond\Pg\Result;

class ItemController extends RestController
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
	 * REQUEST
	 *   - *description
	 *   - *quantity
	 *   - *weight
	 *   - origin(2digit country code)
	 *   - hsTarrifNumber
     *
	 * RESPONSE
	 *   - id
	 *   - type: Item
	 *   - description
	 *   - quantity
	 *   - weight
	 *   - origin
	 *   - hsTarrifNumber
	 */
	public function createItemAction()
	{
		$content = json_decode($this->get("request")->getContent());

		$formattedContent = [
			"description" => $content->description,
			"quantity" => $content->quantity,
			"weight" => $content->weight
		];

		if (isset($content->origin)) {
			$formattedContent["originCountryCode"] = $this->entityManager["Country"]->find($content->origin);
		}

		if (isset($content->hsTarrifNumber)) {
			$formattedContent["hsTarrifNumber"] = $content->hsTarrifNumber;
		}
		d($formattedContent);

		$item = $this->entityManager->getRepository("Item")->make($formattedContent);
		$this->entityManager->recordManager->persist($item);
		$this->entityManager->recordManager->flush();

		d($item);

		$formattedResponseData = [
			"id" => $item->getId(),
			"type" => "Item",
			"description" => $item->getDescription(),
			"quantity" => $item->getQuantity(),
			"weight" => $item->getWeight(),
			"origin" => $item->getOriginCountryCode()->getCc(),
			"hsTarrifNumber" => $item->getHsTarrifNumber()
		];

		return new Response(
			json_encode($formattedResponseData),
			200,
			array('content-type' => "application/json")
		);
	}
}