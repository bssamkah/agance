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

   
    public function rechercheAction() {
        $em = $this->getDoctrine()->getManager();
        $offres = $em->getRepository("AgenceFrontBundle:Offre")->findAll(array('createdAt' => 'DESC'));
        return $this->render('AgenceFrontBundle:Recherche:recherche.html.twig',array('offres' => $offres));
        
    }
    public function rechercheIndexAction() {
         $request = $this->getRequest();
      
        $chambre = $request->query->get('chambre');
         $etage = $request->query->get('etage');
        $offres = NULL;
        $em = $this->getDoctrine()->getEntityManager();
       
       
        if ($chambre != null) {
            $offres = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('nbrChambre' => $chambre));
           
            }
            if ($etage != null) {
            $offres = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('etage' => $etage));
           
            }
            
       
       

        $res['offres'] = $offres;
        $res['chambre'] = $chambre;
       
      
        $res['nbr_offres'] = count($res['offres']);
        return $this->render('AgenceFrontBundle:Recherche:searechIndex.html.twig',array('res' => $res));
        
    }


}
