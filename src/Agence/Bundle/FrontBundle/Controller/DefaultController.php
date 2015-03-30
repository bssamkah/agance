<?php

namespace Agence\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AgenceFrontBundle:Default:redirect.html.twig');
    }
    public function accueilAction()
    {
        return $this->render('AgenceFrontBundle:Default:site.html.twig');
    }
}