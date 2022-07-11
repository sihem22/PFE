<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Notification;
use tuto\BackofficeBundle\Form\NotificationType;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller
{
 
    public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $notifications =$em->getRepository('tutoBackofficeBundle:Notification')->findAll();
         return $this->render('tutoBackofficeBundle:Notification:notifications.html.twig', array('notifications'=>$notifications));
     }
    
}

