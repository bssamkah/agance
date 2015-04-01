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
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository("AgenceFrontBundle:Offre")->findAll();
         $offresfavoris = $em->getRepository("AgenceFrontBundle:OffreFavoris")->findby(array('client' => $user));
        return $this->render('AgenceFrontBundle:Default:site.html.twig', array('offres' => $offres,'favoriss' => $offresfavoris));
    }
}