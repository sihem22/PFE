<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\TypeAbonnement;
use tuto\BackofficeBundle\Form\TypeAbonnementType;
use Symfony\Component\HttpFoundation\Response;

class TypeAbonnementController extends Controller
{
   public function ajoutAction()
    {
        $message="Ajouter un type D'Abonnement";
        $em=$this->getDoctrine()->getManager();
        $TypeAbonnement = new TypeAbonnement();
        $form=$this-> createForm(new TypeAbonnementType(),$TypeAbonnement);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { $em->persist($TypeAbonnement);
        $em->flush();
        $this->addFlash("success", "votre typeAbonnement a été ajouté avec sucées");
        return $this->redirectToRoute('tuto_TypeAbonnement');
       // $message="un TypeAbonnement est ajouté";
        }
        }
        return $this->render('tutoBackofficeBundle:TypeAbonnement:edit.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
    }
    public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $Typeabonnements =$em->getRepository('tutoBackofficeBundle:TypeAbonnement')->findAll();
         return $this->render('tutoBackofficeBundle:TypeAbonnement:Typeabonnements.html.twig', array('Typeabonnements'=>$Typeabonnements));
     }
     public function modifierAction($id)
    {
        $message="Modifier un Typeabonnements";
        $em=$this->getDoctrine()->getManager();
         $TypeAbonnement =$em->getRepository('tutoBackofficeBundle:TypeAbonnement')->find($id);
        
        
        $form=$this-> createForm(new TypeAbonnementType(),$TypeAbonnement);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { 
        $em->flush();
         $this->addFlash("success", "votre typeAbonnement a été modifié avec sucées");
         return $this->redirectToRoute('tuto_TypeAbonnement');
        //$message="un TypeAbonnement est modifié";
        }
        }
        return $this->render('tutoBackofficeBundle:TypeAbonnement:modif.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
}
          public function supprimerAction($id)
          {$em=$this->getDoctrine()->getManager();
           $TypeAbonnement =$em->find('tutoBackofficeBundle:TypeAbonnement',$id);
           if (!$TypeAbonnement)
           {
               throw $this->createNotFoundException('TypeAbonnementavec l\'id ' .$id.' n\'existe pas');
           }
           $em->remove($TypeAbonnement);
           $em->flush();
            $this->addFlash("success", "votre typeAbonnement a été supprimé avec sucées");
           return $this->redirectToRoute('tuto_TypeAbonnement');
           
           //return new Response("TypeAbonnement supprimée avec succées");
          }
}
