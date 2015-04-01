<?php

namespace Agence\Bundle\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Agence\Bundle\FrontBundle\Entity\Offre;


/**
 * Offre controller.
 *
 * @Route("/recherche")
 */
class RechercheController extends Controller {

    /**
     * Finds and displays a Offre entity.
     *
     * @Route("/", name="offre_recherche")
     * @Method("GET")
     * @Template()
     */
    public function rechercheAction() {
        $em = $this->getDoctrine()->getManager();

        $offres = $em->getRepository('AgenceFrontBundle:Offre')->findAll();

        if (!$offres) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }
   return $this->render('AgenceFrontBundle:Recherche:recherche.html.twig',array('offres' => $offres));
        
    }


}
