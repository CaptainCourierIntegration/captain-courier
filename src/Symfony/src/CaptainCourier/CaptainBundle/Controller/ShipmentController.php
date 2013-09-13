<?php

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class ShipmentController extends RestController
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
	public function cgetAction()
	{
		return $this->response;
	}

	// get
	public function getAction($id)
	{
		return $this->response;
	}

	// create
	public function cpostAction()
	{
		return $this->response;
	}

	public function getConfirmAction($id)
	{
		return $this->response;
	}

	public function getAbortAction($id)
	{
		return $this->response;
	}

	public function getTrackAction($id)
	{
		return $this->response;
	}

	public function getQuotesAction($id)
	{
		return $this->response;
	}

}