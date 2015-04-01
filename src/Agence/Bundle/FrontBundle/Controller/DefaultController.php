<?php

namespace Agence\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();
      
        $chambre = $request->query->get('chambre');
        $etage = $request->query->get('etage');
        $prix = $request->query->get('date');
        $type = $request->query->get('type');
        $offresr = NULL;
        $em = $this->getDoctrine()->getEntityManager();
       
       
        if ($chambre != null) {
            $resultats = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('nbrChambre' => $chambre));
            if ($resultats != null) {
                foreach ($resultats as $resultat) {
                    foreach ($resultat as $off) {
                        $offresr[] = $off;
                    }
                }
            } else
            // $events = $em->createQuery("SELECT e FROM FrontOfficeOptimusBundle:Event e WHERE e.createur='' " );
                $offresr = NULL;
            // die ("inexistant")
            ;
        }
        if ($etage != null) {
            $resultats = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('etage' => $etage));
            if ($resultats != null) {
                foreach ($resultats as $resultat) {
                    foreach ($resultat as $off) {
                        $offresr[] = $off;
                    }
                }
            } else
            // $events = $em->createQuery("SELECT e FROM FrontOfficeOptimusBundle:Event e WHERE e.createur='' " );
                $offresr = NULL;
            // die ("inexistant")
            ;
        }
        if ($prix != null) {
            $resultats = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('prix' => $prix));
            if ($resultats != null) {
                foreach ($resultats as $resultat) {
                    foreach ($resultat as $off) {
                        $offresr[] = $off;
                    }
                }
            } else
            // $events = $em->createQuery("SELECT e FROM FrontOfficeOptimusBundle:Event e WHERE e.createur='' " );
                $offresr = NULL;
            // die ("inexistant")
            ;
        }
         if ($type != null) {
            $resultats = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array('type' => $type));
            if ($resultats != null) {
                foreach ($resultats as $resultat) {
                    foreach ($resultat as $off) {
                        $offresr[] = $off;
                    }
                }
            } else
            // $events = $em->createQuery("SELECT e FROM FrontOfficeOptimusBundle:Event e WHERE e.createur='' " );
                $offresr = NULL;
            // die ("inexistant")
            ;
        }


       

        $res['offres'] = $offresr;
        $res['chambre'] = $chambre;
        $res['etage'] = $etage;
        $res['prix'] = $prix;
        $res['type'] = $type;
      
        $res['nbr_offres'] = count($res['offres']);
        $offres = $em->getRepository("AgenceFrontBundle:Offre")->findBy(array(),array('createdAt' => 'DESC'),6);
        return $this->render('AgenceFrontBundle:Default:redirect.html.twig', array('offres' => $offres,'res' => $res));
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