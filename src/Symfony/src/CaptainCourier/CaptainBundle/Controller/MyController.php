<?php

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MyController extends Controller
{


/**
 *	
 * @Route("/game_on/{username}")
 * @Template()
 */
	public function indexAction($username)
	{
		return array('username' => $username);
	}


}