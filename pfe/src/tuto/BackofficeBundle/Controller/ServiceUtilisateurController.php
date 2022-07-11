<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\ServiceUtilisateur;
use Symfony\Component\HttpFoundation\Response;

class ServiceUtilisateurController extends Controller
{
 
    public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $serviceutilisateurs =$em->getRepository('tutoBackofficeBundle:ServiceUtilisateur')->findAll();
         return $this->render('tutoBackofficeBundle:ServiceUtilisateur:serviceutilisateurs.html.twig', array('serviceutilisateurs'=>$serviceutilisateurs));
     }
}

