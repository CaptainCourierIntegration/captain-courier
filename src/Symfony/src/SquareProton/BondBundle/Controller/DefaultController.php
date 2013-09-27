<?php

namespace SquareProton\BondBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SquareProtonBondBundle:Default:index.html.twig', array('name' => $name));
    }
}
