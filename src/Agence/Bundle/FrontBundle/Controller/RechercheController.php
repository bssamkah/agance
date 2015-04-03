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
          $type = $request->query->get('type');
          $prix = $request->query->get('prix');
        $offres = NULL;
       
       $condition = "WHERE 1=1";
        $parameters = array();
       
       if ($chambre != null) {
            $condition = $condition . " AND o.chambre=:chambre";
            $offres[':chambre'] = $chambre;
        }
        if ($etage != null) {
            $condition = $condition . " AND UPPER(o.etage) LIKE :etage";
            $parameters[':etage'] = $etage;
        }
        if ($type != null) {
            $condition = $condition . " AND UPPER(o.type) LIKE :type";
            $parameters[':type'] = $type;
        }
        if ($prix != null) {
            $condition = $condition . " AND o.prix = :prix";
            $parameters[':prix'] = $prix;
        }
        
        
        $em = $this->getDoctrine()->getEntityManager();
        if($chambre || $etage || $type || $prix != Null){
           $offress = $em->createQuery("SELECT u FROM AgenceFrontBundle:Offre o " . $condition);
            $offress->setParameters($parameters);
            $offres = $offress->getResult();
        }
        $res['offres'] = $offres;
        $res['chambre'] = $chambre;
         $res['chambre'] = $etage;
          $res['chambre'] = $type;
           $res['chambre'] = $prix;
       
      
        $res['nbr_offres'] = count($res['offres']);
        return $this->render('AgenceFrontBundle:Recherche:searechIndex.html.twig',array('res' => $res));
        
    }


}
