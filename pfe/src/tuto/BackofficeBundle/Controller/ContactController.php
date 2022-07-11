<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
   public function contactAction()
 
     { $em=$this->getDoctrine()->getManager();
       $contacts =$em->getRepository('tutoBackofficeBundle:Contact')->findAll();
         return $this->render('tutoBackofficeBundle:Contact:contact.html.twig', array('contacts'=>$contacts));
     }
   
}

