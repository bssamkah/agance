<?php

namespace Agence\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array(),array('createdAt' => 'DESC'),6);
        return $this->render('AgenceFrontBundle:Default:redirect.html.twig', array('offres' => $offres));
    }
    public function accueilAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository("AgenceFrontBundle:Offre")->findAll(array('createdAt' => 'DESC'));
         $offresfavoris = $em->getRepository("AgenceFrontBundle:OffreFavoris")->findby(array('client' => $user));
        return $this->render('AgenceFrontBundle:Default:site.html.twig', array('offres' => $offres,'favoriss' => $offresfavoris));
    }
    public function mesFavorisAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
       
         $offres = $em->getRepository("AgenceFrontBundle:OffreFavoris")->findby(array('client' => $user));
        return $this->render('AgenceFrontBundle:Offre:mesFavoris.html.twig', array('offres' => $offres));
    }
}