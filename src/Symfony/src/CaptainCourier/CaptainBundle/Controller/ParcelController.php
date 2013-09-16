<?php

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class ParcelController extends RestController
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