<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller {

    public function notificationAction() {
        $em = $this->getDoctrine()->getManager();

        $notifications = $em->getRepository("tutoBackofficeBundle:Notification")->findBy(array('user' => $this->getUser(), 'lu' => false), array('dateNotif' => 'desc'));
        return $this->render('FrontofficeBundle:Notification:notification.html.twig', array(
                    'notifications' => $notifications));
    }

   

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $notifications = $em->getRepository("tutoBackofficeBundle:Notification")->findBy(array('user' => $this->getUser()), array('dateNotif' => 'desc'));
        return $this->render('FrontofficeBundle:Notification:affiche.html.twig', array(
                    'notifications' => $notifications));
    }

    public function affiche1Action() {
        $em = $this->getDoctrine()->getManager();
 
 
   
 
        $demandes = $em->getRepository("tutoBackofficeBundle:Demande")->getDemandeNonLu($this->getUser()->getId());

        //select * from demandes d where is NOT IN (select * from promposition p   where   p.demande_id = d.id and p.user = $this->getUsert() )
        return $this->render('FrontofficeBundle:Notification:affiche1.html.twig', array(
                    'demandes' => $demandes));
    }

    public function coordonneeAction(\tuto\BackofficeBundle\Entity\Demande $id, \tuto\BackofficeBundle\Entity\Notification $notifId) {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("tutoBackofficeBundle:User")->findBy(array('id' => $id->getUser()->getId()));
        $notification=$em->find("tutoBackofficeBundle:Notification",$notifId);
        $notification->setLu(true);
        $em->persist($notification);
        $em->flush();
        return $this->render('FrontofficeBundle:Demande:coordonnee.html.twig', array(
                    'users' => $users));
    }
    
    public function countAction()
 
     { $em=$this->getDoctrine()->getManager();
      
        $nb=array();
       {
            $nb[]=array(
               
                'count'=>$em->getRepository("tutoBackofficeBundle:Notification")->count($this->getUser())
                );
        }
        
         return $this->render('FrontofficeBundle:Notification:nb.html.twig',array('nb'=>$nb));
         
     }
}
