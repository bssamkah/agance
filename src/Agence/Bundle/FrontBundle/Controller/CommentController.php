<?php
namespace Agence\Bundle\FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Agence\Bundle\FrontBundle\Entity\Comment;

/**
 * Comment controller.
 *
 * @Route("/comment")
 */
class CommentController extends Controller {
    
    
    
     /**
 *
 * @Route("/offre/{id}", name="ajax_offre_comment", options={"expose"=true})
 * @Method("POST")
 * 
 */
public function ajaxCommentAction(Request $request, $id) {
   
        $comment = new Comment();
        $em = $this->getDoctrine()->getManager();
        $commenteur = $this->container->get('security.context')->getToken()->getUser();
        $commenteurId = $commenteur->getId();
        $commentor = $em->getRepository('AgenceFrontBundle:User')->find($commenteurId);

        if ($request->isXmlHttpRequest()) {
            $content = $this->get("request")->getContent();
            $cntnt = rawurldecode(urldecode($content));
            $vars = explode('=', $cntnt);
            $cmt = $vars[1];
            $offre = $em->getRepository('AgenceFrontBundle:Offre')->find($id);
            $comment->setCommenteur($commentor);
            $comment->setOffre($offre);
            $comment->setCommentaire($cmt);
            $comment->setCreatedat(new \Datetime());
            $em->persist($comment);
            $em->flush();
        }
        
        return $response = new Response();
    }
    
}