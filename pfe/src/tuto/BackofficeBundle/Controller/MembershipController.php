<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Membership;
use tuto\BackofficeBundle\Form\MembershipType;
use Symfony\Component\HttpFoundation\Response;

class MembershipController extends Controller
{
 
    public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $membership =$em->getRepository('tutoBackofficeBundle:Membership')->findAll();
         return $this->render('tutoBackofficeBundle:Membership:membership.html.twig', array('membership'=>$membership));
     }
     
}


