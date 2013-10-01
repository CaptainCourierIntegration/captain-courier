<?php

namespace CaptainCourier\CaptainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    public function securityAction()
    {

        return $this->render(
            'CaptainCourierCaptainBundle:Default:index.html.twig',
            array(
                'name' => "Peter",
            )
        );
    }

}