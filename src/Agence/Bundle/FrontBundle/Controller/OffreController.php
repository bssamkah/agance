<?php

namespace Agence\Bundle\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Agence\Bundle\FrontBundle\Entity\Offre;
use Agence\Bundle\FrontBundle\Form\OffreType;

/**
 * Offre controller.
 *
 * @Route("/offre")
 */
class OffreController extends Controller {

    /**
     * Finds and displays a Offre entity.
     *
     * @Route("/{id}/show", name="offre_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgenceFrontBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }
   
        return array(
            'entity' => $entity,
           
        );
    }

    /**
     * 
     *
     * @Route("/{id}/modifier", name="update-offre")
     * @Method("GET|POST")
     * @Template()
     */
    public function updateAction(Request $request, $id) {
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser(); //utilisateur courant
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('AgenceFrontBundle:Offre')->find($id);
        if (!$offre) {
            return $this->render('AgenceFrontBundle::404.html.twig');
        }
        $editForm = $this->createForm(new OffreType(), $offre);
        $editForm->handleRequest($request);
        if ($editForm->isValid()) {
            $em->persist($offre);
            $em->flush();
//add notification

           return $this->redirect($this->generateUrl('offre_show', array('id' => $offre->getId())));
        }
        return $this->render('AgenceFrontBundle:Offre:edit.html.twig', array(
                    'user' => $user,
                    'offre' => $offre,
                    'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * 
     *
     * @Route("/ajouter/", name="add-offre")
     * @Method("GET|POST")
     * @Template()
     */
    public function addAction(Request $request) {
        if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('.');
        }
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $offre = new Offre();
        $offre->setResponsable($user);
        $offre->setCreatedAt(new \DateTime());

        $form = $this->createForm(new OffreType, $offre);
        $req = $this->get('request');
        if ($req->getMethod() == "POST") {
            $form->bind($req);
            if ($form->isValid()) {
                $em->persist($offre);
                $em->flush();
//add notification + add prticipation + add History

                return $this->redirect($this->generateUrl('offre_show', array('id' => $offre->getId())));
            }
        }
        return $this->render('AgenceFrontBundle:Offre:new.html.twig', array('form' => $form->createView(), 'user' => $user));
    }
     /**
     * 
     *
     * @Route("/{id}/supprimer/", name="delete-offre", options={"expose"=true})
     * @Method("GET|POST|DELETE")
     * @Template()
     */
    public function deleteEventAction(Request $request,$id) {
         if (!$this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            // Sinon on déclenche une exception « Accès interdit »
            throw new AccessDeniedException('.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser(); //utilisateur courant
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('AgenceFrontBundle:Offre')->find($id);
        if (!$offre ) {
             return $this->render('AgenceFrontBundle::404.html.twig');
        }
        $em->remove($offre);
        $em->flush();
        
        return $this->redirect($this->generateUrl('user_accueil'));
    }

}
