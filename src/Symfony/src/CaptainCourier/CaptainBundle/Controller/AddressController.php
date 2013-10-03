<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

use Bond\Pg;
use Bond\Pg\Catalog;
use Bond\Pg\ConnectionSettings;
use Bond\Pg\Resource;
use Bond\EntityManager;
use CaptainCourier\CaptainBundle\Register\EntityManager as RegisterEM;
use Bond\Entity\EventEmitter;
use Bond\Entity\Types\DateTime;
use Bond\Entity\Types\DateRange;
use Bond\Entity\Types\DateInterval;
use Bond\Sql\Query;
use Bond\Pg\Result;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddressController extends Controller
{
	private $d;
	private $entityManager;
	private $database;

	private $addressApiMapper;

	public function __construct(
		$d, 
		$entityManager, 
		$database,
		$addressApiMapper
	)
	{
		$this->d = $d;
		$this->entityManager = $entityManager;
		$this->database = $database;
		$this->addressApiMapper = $addressApiMapper;

		// $connectionSettings = new ConnectionSettings([
		// 	"host" => "localhost",
		// 	"dbname" => "captain",
		// 	"user" => "captain",
		// 	"password" => "captain"
		// ]);

		// $db = new Pg(new Resource($connectionSettings));

		// $this->em = new EntityManager($db, [], new EventEmitter());
		// $duplicate = new RegisterEM($this->em);

		// $address = $em->getRepository("Address")->make([
		// 	"companyName" => "Omlet Ltd",
		// 	"name" => "Joseph",
		// 	"phone" => "077717798316",
		// 	"email" => "joseph@omlet.co.uk",
		// 	"line1" => "somewhere",
		// 	"postcode" => "OX17 1RR",
		// 	"cc" => "GB"
		// ]);

		// $time = new DateRange(new DateTime(), (new DateTime())->add(new DateInterval('P4D')));
		// $shipment = $em->getRepository("Shipment")->make([
		// 	"collectionAddressId" => $address,
		// 	"collectionTime" => $time,
		// 	"deliveryAddressId" => $address,
		// 	"deliveryTime" => $time,
		// 	"contractNumber" => "HA_GAY",
		// 	"serviceCode" => "011"
		// ]);

		// $em->recordManager->persist($address);
		// $em->recordManager->flush();

//		$query = new Query('SELECT *, \'{"name": "joseph"}\'::json FROM "Address";');
//		$query = new Query(<<<SQL
//			SELECT * FROM "Address"
// SQL
//		);
//		$result = $db->query($query)->fetch(Result::TYPE_DETECT);
//		$addresses = $em->getRepository("Address")->initByDatas($result);
//		d($addresses);
//
//		parent::__construct();
        // $em->recordManager->delete($em->find("Address", 2));
        // $em->recordManager->flush();

	}


	/**
     * creates addresses
     * type: POST
     * requestType: json
	 *
     * REQUEST
     *   - *name
     *   - *email
     *   - phone 
     *   - *line1
     *   - line2
     *   - line3
     *   - *town
     *   - *region
     *   - *countryCode
     *   - *postcode
     *
	 * RESPONSE
	 * 	 - id
	 *   - type: Address
     *   - name
     *   - email
     *   - phone 
     *   - line1
     *   - line2
     *   - line3
     *   - town
     *   - region
     *   - countryCode
     *   - postcode
     */
	public function createAddressAction()
	{
        $contentString = $this->get("request")->getContent();
        $args = json_decode($contentString);

        foreach (["line2", "line3", "phone"] as $optionalField) {
            if(!isset($args->$optionalField)) {
                $args->$optionalField = null;
            }
        }

        $address = $this->entityManager->getRepository("Address")->make([
             "name" => $args->name,
             "email" => $args->email,
             "line1" => $args->line1,
             "postcode" => $args->postcode,
             "cc" => $args->countryCode,
             "phone" => $args->phone,
             "line2" => $args->line2,
             "line3" => $args->line3
        ]);

        $this->entityManager->recordManager->persist($address);
        $this->entityManager->recordManager->flush();

		return new Response(
            json_encode($this->addressApiMapper->toApiObject($addresses)),
            200,
            array('content-type' => "application/json")
        );
	}

	/**
	 * will only check if address exists
	 *
	 * if address is valid response is:
	 * RESPONSE
	 *   - id
	 *   - status: valid
	 * if address isn't valid, response is:
	 *	 
	 * RESPONSE:
	 *   - id
	 *   - status: invalid
	 *   - reason
	 */
	public function verifyAddressAction($id)
	{
		$address = $this->entityManager["Address"]->find($id);

		if($address) {
			$responseData = ["status" => "valid"];
		} else {
			$responseData = ["status" => "invalid", "reason" => "no address exists with id {$id}"];
		}
		$responseData["id"] = "$id";

		return new Response(
			json_encode($responseData),
			200,
			['content-type' => 'application/json']
		);
	}

	/**
	 * returns an address object
	 *
	 *
	 */
	public function viewAddressAction($id)
	{
		$address = $this->entityManager["Address"]->find($id);
		return new Response(
			json_encode($this->addressApiMapper->toApiObject($address)),
			200,
			['content-type' => 'application/json']
		);			
	}
}