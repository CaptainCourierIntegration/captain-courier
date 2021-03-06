<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\RouteResource;

// TODO: fix routing makes this goto customsinfos (no 's' at end)
/**
 * @RouteResource("CustomsInfo")
 */
class CustomsInfoController extends RestController
{
	private $response;

	public function __construct()
	{
		parent::__construct();
		$this->response = new Response(
			'{"status": "ALL GOOD"}',
			200,
			array('content-type' => "application/json")
		);
	}

	// view
	public function getAction($id)
	{
		return $this->response;
	}

	// create
	public function cpostAction()
	{
		return $this->response;
	}
}