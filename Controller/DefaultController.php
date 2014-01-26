<?php

namespace Filix\PushBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FilixPushBundle:Default:index.html.twig', array('name' => $name));
    }
}
