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
         $request = $this->getRequest();
      
        $chambre = $request->query->get('chambre');
         $etage = $request->query->get('etage');
          $type = $request->query->get('type');
          $prix = $request->query->get('prix');
         
        $offe = NULL;
       
       $condition = "WHERE 1=1";
        $parameters = array();
       
       if ($chambre != null) {
            $condition = $condition . " AND o.nbrChambre = :chambre";
            $parameters[':chambre'] = $chambre;
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
            $condition = $condition . " AND o.prix = :prix ";
            $parameters[':prix'] = $prix;
           
            
        }
        
        
        $em = $this->getDoctrine()->getEntityManager();
        if($chambre || $etage || $type || $prix != Null){
           $offress = $em->createQuery("SELECT o FROM AgenceFrontBundle:Offre o " . $condition);
            $offress->setParameters($parameters);
            $offe = $offress->getResult();
        }
        $res['offres'] = $offe;
        $res['chambre'] = $chambre;
         $res['etage'] = $etage;
          $res['type'] = $type;
           $res['prix'] = $prix;
           
       
      
        $res['nbr_offres'] = count($res['offres']);
        $offres = $em->getRepository("AgenceFrontBundle:Offre")->findAll(array('createdAt' => 'DESC'));
        return $this->render('AgenceFrontBundle:Recherche:recherche.html.twig',array('offres' => $offres,'res' => $res));
        
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
            $condition = $condition . " AND o.nbrChambre = :chambre";
            $parameters[':chambre'] = $chambre;
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
           $offress = $em->createQuery("SELECT o FROM AgenceFrontBundle:Offre o " . $condition);
            $offress->setParameters($parameters);
            $offres = $offress->getResult();
        }
        $res['offres'] = $offres;
        $res['chambre'] = $chambre;
         $res['etage'] = $etage;
          $res['type'] = $type;
           $res['prix'] = $prix;
       
      
        $res['nbr_offres'] = count($res['offres']);
        return $this->render('AgenceFrontBundle:Recherche:searechIndex.html.twig',array('res' => $res));
        
    }


}
