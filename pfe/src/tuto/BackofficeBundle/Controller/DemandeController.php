<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Demande;
use tuto\BackofficeBundle\Form\DemandeType;
use Symfony\Component\HttpFoundation\Response;

class DemandeController extends Controller {

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $demandes = $em->getRepository('tutoBackofficeBundle:Demande')->findAll();
        return $this->render('tutoBackofficeBundle:Demande:demandes.html.twig', array('demandes' => $demandes));
    }

    public function modifierAction($id) {
        $em = $this->getDoctrine()->getManager();

        $Demande = $em->find("tutoBackofficeBundle:Demande", $id);
        $Demande->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('5'));
        $em->persist($Demande);




        $lastId = $Demande->getId();
        $demande = $em->find('tutoBackofficeBundle:Demande', $lastId);

        $valide = $demande->getEtat();
        if ($valide->getId() == 5) {
            $service = $demande->getService();


            $users = $em->getRepository('tutoBackofficeBundle:User')->findAll();
            $prof = array();
            foreach ($users as $user) {
                if ($user->hasRole('ROLE_PROF'))
                    $prof[] = $user;
              
            }

            
            foreach ($prof as $element) {
                foreach ($element->getServices() as $prof_service) {
                        
                       
                    if ($prof_service->getId() == $service->getId()) {
                        $notification = new \tuto\BackofficeBundle\Entity\Notification();
                        $notification
                                ->setDemande($demande)
                                ->setProposition()
                                ->setUser($element)
                                ->setDateNotif(new \DateTime())
                                ->setLu(false);
                        $em->persist($notification);

                      
                    }
                }



            
                
                
                //$message="une Demande est modifiée";
            }
        }
        $em->flush();
        $this->addFlash("success", "votre Demande a été modifié avec sucées");
        return $this->redirectToRoute('tuto_demande');
        
        return $this->render('tutoBackofficeBundle:Demande:modif.html.twig', array(
                    'Demande' => $Demande,
                        )
                );
    }

    public function etatAction() {
        $em = $this->getDoctrine()->getManager();
        $demandes = $em->getRepository('tutoBackofficeBundle:Demande')->findAll();
        return $this->render('tutoBackofficeBundle:Demande:demandes.html.twig', array('demandes' => $demandes));
    }
  public function notifadminAction()
 
     { $em=$this->getDoctrine()->getManager();
       $demandes =$em->getRepository('tutoBackofficeBundle:Demande')->findByetat();

         return $this->render('tutoBackofficeBundle:Demande:notifadmin.html.twig', array('demandes'=>$demandes));
     }

     public function countAction()
 
     { $em=$this->getDoctrine()->getManager();
       $nb =$em->getRepository('tutoBackofficeBundle:Demande')->count();
       
         return new Response($nb);
         
     }
}
