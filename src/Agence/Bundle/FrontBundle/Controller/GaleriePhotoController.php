<?php

namespace Agence\Bundle\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Agence\Bundle\FrontBundle\Entity\GaleriePhoto;
use Agence\Bundle\FrontBundle\Form\GaleriePhotoType;

/**
 * GaleriePhoto controller.
 *
 * @Route("/galeriephoto")
 */
class GaleriePhotoController extends Controller
{

    /**
     * Lists all GaleriePhoto entities.
     *
     * @Route("/", name="galeriephoto")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AgenceFrontBundle:GaleriePhoto')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new GaleriePhoto entity.
     *
     * @Route("/", name="galeriephoto_create")
     * @Method("POST")
     * @Template("AgenceFrontBundle:GaleriePhoto:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new GaleriePhoto();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('galeriephoto_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a GaleriePhoto entity.
     *
     * @param GaleriePhoto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(GaleriePhoto $entity)
    {
        $form = $this->createForm(new GaleriePhotoType(), $entity, array(
            'action' => $this->generateUrl('galeriephoto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new GaleriePhoto entity.
     *
     * @Route("/new", name="galeriephoto_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new GaleriePhoto();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a GaleriePhoto entity.
     *
     * @Route("/{id}", name="galeriephoto_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgenceFrontBundle:GaleriePhoto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GaleriePhoto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing GaleriePhoto entity.
     *
     * @Route("/{id}/edit", name="galeriephoto_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgenceFrontBundle:GaleriePhoto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GaleriePhoto entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a GaleriePhoto entity.
    *
    * @param GaleriePhoto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GaleriePhoto $entity)
    {
        $form = $this->createForm(new GaleriePhotoType(), $entity, array(
            'action' => $this->generateUrl('galeriephoto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GaleriePhoto entity.
     *
     * @Route("/{id}", name="galeriephoto_update")
     * @Method("PUT")
     * @Template("AgenceFrontBundle:GaleriePhoto:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AgenceFrontBundle:GaleriePhoto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GaleriePhoto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('galeriephoto_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a GaleriePhoto entity.
     *
     * @Route("/{id}", name="galeriephoto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AgenceFrontBundle:GaleriePhoto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GaleriePhoto entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('galeriephoto'));
    }

    /**
     * Creates a form to delete a GaleriePhoto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('galeriephoto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    /**
     * Creates a new Photo entity.
     *
     * @Route("/{id}/photo", name="photo_create")
     * @Method("GET|POST")
     * @Template("AgenceFrontBundle:GaleriePhoto:new.html.twig")
     */
    public function createPhotoAction(Request $request,$id)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $offre = $em->getRepository('AgenceFrontBundle:Offre')->find($id);
        $photo = new GaleriePhoto();
        $form = $this->createForm(new GaleriePhotoType(), $photo);
        $form->handleRequest($request);
        $photo->setOffre($offre);
    
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($photo);
            $em->flush();
 $request->getSession()->getFlashBag()->add('uploadphoto', "Votre photo a été ajouter avec success.");
           return $this->redirect($this->generateUrl('offre_show', array('id' => $id)));
        }
        
        return array(
            
            'photo' => $photo,
            'user' => $user,
            'id' => $offre->getId(),
            'form'   => $form->createView(),
        );
    }
}
