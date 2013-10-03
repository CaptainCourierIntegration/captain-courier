<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class ParcelController extends RestController
{
	private $d;
	private $entityManager;
	private $database;

	private $parcelApiMapper;

	public function __construct(
		$d, 
		$entityManager, 
		$database, 
		$parcelApiMapper
	)
	{
		$this->d = $d;
		$this->entityManager = $entityManager;
		$this->database = $database;
		$this->parcelApiMapper = $parcelApiMapper;
	}	

	/**
	 *
	 * creates a parcel
	 *
	 * REQUEST
	 *   - *width in cm
	 *   - *height in cm
	 *   - *length in cm
	 *   - *weight in grams
	 *   - *value in sterling(£)
	 *
	 * RESPONSE
	 *   - id
	 *   - type: Parcel
	 *   - width
	 *   - height
	 *   - length
	 *   - weight
	 *   - value
	 *
	 */
	public function createParcelAction()
	{
		$content = json_decode($this->get("request")->getContent());

		$parcel = $this->entityManager->getRepository("Parcel")->make((array)$content);
		$this->d->log($parcel);
		$this->entityManager->recordManager->persist($parcel);
		$this->entityManager->recordManager->flush();

		return new Response(
			json_encode($this->parcelApiMapper->getApiObject($parcel)),
			200,
			array('content-type' => "application/json")
		);
	}
}