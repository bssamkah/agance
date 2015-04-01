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
        $prix = $request->query->get('date');
        $type = $request->query->get('type');
        $offres = NULL;
        $em = $this->getDoctrine()->getEntityManager();
       
       
        if ($chambre != null) {
            $resultats = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('nbrChambre' => $chambre));
            if ($resultats != null) {
                foreach ($resultats as $resultat) {
                    foreach ($resultat as $off) {
                        $offres[] = $off;
                    }
                }
            } else
            // $events = $em->createQuery("SELECT e FROM FrontOfficeOptimusBundle:Event e WHERE e.createur='' " );
                $offres = NULL;
            // die ("inexistant")
            ;
        }
        if ($etage != null) {
            $resultats = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('etage' => $etage));
            if ($resultats != null) {
                foreach ($resultats as $resultat) {
                    foreach ($resultat as $off) {
                        $offres[] = $off;
                    }
                }
            } else
            // $events = $em->createQuery("SELECT e FROM FrontOfficeOptimusBundle:Event e WHERE e.createur='' " );
                $offres = NULL;
            // die ("inexistant")
            ;
        }
        if ($prix != null) {
            $resultats = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('prix' => $prix));
            if ($resultats != null) {
                foreach ($resultats as $resultat) {
                    foreach ($resultat as $off) {
                        $offres[] = $off;
                    }
                }
            } else
            // $events = $em->createQuery("SELECT e FROM FrontOfficeOptimusBundle:Event e WHERE e.createur='' " );
                $offres = NULL;
            // die ("inexistant")
            ;
        }
         if ($type != null) {
            $resultats = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('type' => $type));
            if ($resultats != null) {
                foreach ($resultats as $resultat) {
                    foreach ($resultat as $off) {
                        $offres[] = $off;
                    }
                }
            } else
            // $events = $em->createQuery("SELECT e FROM FrontOfficeOptimusBundle:Event e WHERE e.createur='' " );
                $offres = NULL;
            // die ("inexistant")
            ;
        }


       

        $res['offres'] = $offres;
        $res['chambre'] = $chambre;
        $res['etage'] = $etage;
        $res['prix'] = $prix;
        $res['type'] = $type;
      
        $res['nbr_offres'] = count($res['offres']);
        return $this->render('AgenceFrontBundle:Recherche:searechIndex.html.twig',array('res' => $res));
        
    }


}
