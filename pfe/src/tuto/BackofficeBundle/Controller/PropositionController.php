<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Proposition;
use tuto\BackofficeBundle\Form\PropositionType;
use Symfony\Component\HttpFoundation\Response;

class PropositionController extends Controller {

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $propositions = $em->getRepository('tutoBackofficeBundle:Proposition')->findAll();
        return $this->render('tutoBackofficeBundle:Proposition:propositions.html.twig', array('propositions' => $propositions));
    }

    public function modifierAction($id) {
         $em = $this->getDoctrine()->getManager();
         $Proposition = $em->find("tutoBackofficeBundle:Proposition", $id);
        $Proposition->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('5'));
        $em->persist($Proposition);
            
                $user = $Proposition->getDemande()->getUser();
                $demande = $Proposition->getDemande();

                $valide = $Proposition->getEtat();
                if ($valide->getId() == 5) {
                    $i = 0;
                    $notification = new \tuto\BackofficeBundle\Entity\Notification();
                    $notification
                            ->setDemande($demande)
                            ->setProposition($Proposition)
                            ->setUser($user)
                            ->setDateNotif(new \DateTime())
                            ->setLu(false);
                    $em->persist($notification);

                    $i++;
                }
                
                $em->flush();
                $this->addFlash("success", "votre categorie a été modifié avec sucées");
                return $this->redirectToRoute('tuto_proposition');
                //$message="une categorie est modifiée";
            
        
        return $this->render('tutoBackofficeBundle:Proposition:modif.html.twig', array(
                    'Proposition' => $Proposition
                        )
        );
    }
  public function notifpropadminAction()
 
     { $em=$this->getDoctrine()->getManager();
       $propositions =$em->getRepository('tutoBackofficeBundle:Proposition')->findByetat();
         return $this->render('tutoBackofficeBundle:Proposition:notifpropadmin.html.twig', array('propositions'=>$propositions));
     }
    public function countAction()
 
     { $em=$this->getDoctrine()->getManager();
       $nb =$em->getRepository('tutoBackofficeBundle:Proposition')->count();
       
         return new Response($nb);
         
     }
}


