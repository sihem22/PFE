<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Proposition;
use tuto\BackofficeBundle\Form\Proposition1Type;
use Symfony\Component\HttpFoundation\Response;

class PropositionController extends Controller {

    public function propositionAction(\tuto\BackofficeBundle\Entity\Demande $id) {

        $em = $this->getDoctrine()->getManager();
        $Proposition = new Proposition();

        $form = $this->createForm(new Proposition1Type(), $Proposition);

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $Proposition->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('4'));
            $Proposition->setDemande($id);
            $Proposition->setUser($this->getUser());
            $Proposition->setDateProposition(new \DateTime());
          
            $em->persist($id);
            $form->handleRequest($request);
            

            if ($form->isValid()) {
                $em->persist($Proposition);
                $em->flush();

                $Proposition = $form->getData();
                $this->addFlash("success", "votre email a été envoyé avec succés , merci pour nous contacter");
                return $this->redirectToRoute('proposition_reponses', array(
                            'demande' => $Proposition->getDemande()->getId(),'id'=>$Proposition->getId()
                   
                ));
                // $message="une Categorie est ajoutée";
            }
        }
        return $this->render('FrontofficeBundle:Proposition:ajouter.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    public function reponsesAction(\tuto\BackofficeBundle\Entity\Demande $demande ,$id ) {
        $em = $this->getDoctrine()->getManager();
        $proposition = $em->getRepository('tutoBackofficeBundle:Proposition')->findBy(array('demande' => $demande, 'id'=>$id));
        return $this->render('FrontofficeBundle:Proposition:reponses.html.twig', array('proposition' => $proposition));
    }

    public function reponsespropAction(\tuto\BackofficeBundle\Entity\Demande $demande,$id, \tuto\BackofficeBundle\Entity\Notification $notifId) {
        $em = $this->getDoctrine()->getManager();
        $proposition = $em->getRepository('tutoBackofficeBundle:Proposition')->findBy(array('demande' => $demande, 'id'=>$id));
        $notification = $em->find("tutoBackofficeBundle:Notification", $notifId);
        $notification->setLu(true);
        $em->persist($notification);
        $em->flush();
        return $this->render('FrontofficeBundle:Notification:notifProp.html.twig', array('proposition' => $proposition));
    }

    public function embaucheAction($id) {
        $em = $this->getDoctrine()->getManager();

        $proposition = $em->find("tutoBackofficeBundle:Proposition", $id);
        $proposition->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('9'));
        $em->persist($proposition);
        $user=$proposition->getUser();
  $demande=$proposition->getDemande();
    
 $lastId=$proposition->getId();
     $Proposition=$em->find('tutoBackofficeBundle:Proposition',$lastId);
            $valide=$Proposition->getEtat();
            if ($valide->getId()==9)

{
     
            
            
           
            
            $i=0;
           
             $notification = new \tuto\BackofficeBundle\Entity\Notification();
                $notification 
                        ->setDemande($demande)
                         ->setProposition($Proposition)
                        ->setUser($user)
                        ->setDateNotif(new \DateTime())
                        ->setLu(false);
            $em->persist($notification);
           
$i++; }  
        $em->flush();
        return $this->render('FrontofficeBundle:Proposition:embauche.html.twig', array(
                    'proposition' => $proposition));
    }

    
}