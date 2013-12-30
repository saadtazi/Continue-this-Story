<?php

namespace SaadTazi\ContinueThisStoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SaadTaziContinueThisStoryBundle:Default:index.html.twig', array('name' => $name));
    }
}
