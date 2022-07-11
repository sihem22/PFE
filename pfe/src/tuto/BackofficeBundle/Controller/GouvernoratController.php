<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Gouvernorat;
use tuto\BackofficeBundle\Form\GouvernoratType;
use Symfony\Component\HttpFoundation\Response;

class GouvernoratController extends Controller
{
    public function ajoutAction()
    {
        $message="Ajouter un gouvernorat";
        $em=$this->getDoctrine()->getManager();
        
        $Gouvernorat = new Gouvernorat();
        $form=$this-> createForm(new GouvernoratType(),$Gouvernorat);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { $em->persist($Gouvernorat);
        $em->flush();
         $this->addFlash("success", "votre gouvernorat a été ajouté avec sucées");
        return $this->redirectToRoute('tuto_gouvernorat');
       // $message="un gouvernorat est ajouté";
        }
        }
        return $this->render('tutoBackofficeBundle:Gouvernorat:edit.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
    }
    public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $gouvernorats =$em->getRepository('tutoBackofficeBundle:Gouvernorat')->findAll();
         return $this->render('tutoBackofficeBundle:Gouvernorat:gouvernorats.html.twig', array('gouvernorats'=>$gouvernorats));
     }
     public function modifierAction($id)
    {
        $message="Modifier un gouvernorat";
        $em=$this->getDoctrine()->getManager();
         $Gouvernorat =$em->getRepository('tutoBackofficeBundle:Gouvernorat')->find($id);
        
        
        $form=$this-> createForm(new GouvernoratType(),$Gouvernorat);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { 
        $em->flush();
        $this->addFlash("success", "votre gouvernorat a été modifié avec sucées");
        return $this->redirectToRoute('tuto_gouvernorat');
       // $message="un gouvernorat est modifié";
        }
        }
        return $this->render('tutoBackofficeBundle:Gouvernorat:modif.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
}
 public function supprimerAction($id)
          {$em=$this->getDoctrine()->getManager();
           $Gouvernorat =$em->find('tutoBackofficeBundle:Gouvernorat',$id);
           if (!$Gouvernorat)
           {
               throw $this->createNotFoundException('Gouvernorat avec l\'id ' .$id.' n\'existe pas');
           }
           $em->remove($Gouvernorat);
           $em->flush();
           $this->addFlash("success", "votre gouvernorat a été supprimé avec sucées");
           return $this->redirectToRoute('tuto_gouvernorat');
           //return new Response("Gouvernorat supprimée avec succées");
          }
}

