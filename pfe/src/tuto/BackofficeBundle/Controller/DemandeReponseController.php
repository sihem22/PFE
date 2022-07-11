<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\DemandeReponse;
use tuto\BackofficeBundle\Form\DemandeReponseType;
use Symfony\Component\HttpFoundation\Response;

class DemandeReponseController extends Controller
{
    public function afficheAction(\tuto\BackofficeBundle\Entity\Demande $demande)
    {
        $em=$this->getDoctrine()->getManager();
        $demandereponses =$em->getRepository('tutoBackofficeBundle:DemandeReponse')->findBy(array('demande'=>$demande));
        return $this->render('tutoBackofficeBundle:DemandeReponse:demandereponses.html.twig', array('demandereponses'=>$demandereponses));
        
     }
}