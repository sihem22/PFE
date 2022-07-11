<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Delegation;
use tuto\BackofficeBundle\Form\DelegationType;
use Symfony\Component\HttpFoundation\Response;

class DelegationController extends Controller
{
   public function ajoutAction()
    {
        $message="Ajouter une Delegation";
        $em=$this->getDoctrine()->getManager();
        $Delegation = new Delegation();
        $form=$this-> createForm(new DelegationType(),$Delegation);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { $em->persist($Delegation);
        $em->flush();
         $this->addFlash("success", "votre délegation a été ajouté avec succés");
        return $this->redirectToRoute('tuto_delegation');
       // $message="une Delegation est ajoutée";
        }
        }
        return $this->render('tutoBackofficeBundle:Delegation:edit.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
    }
     public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $delegations =$em->getRepository('tutoBackofficeBundle:Delegation')->findAll();
         return $this->render('tutoBackofficeBundle:Delegation:delegations.html.twig', array('delegations'=>$delegations));
     }
    public function modifierAction($id)
    {
        $message="Modifier une delegation";
        $em=$this->getDoctrine()->getManager();
         $Delegation =$em->getRepository('tutoBackofficeBundle:Delegation')->find($id);
        
        
        $form=$this-> createForm(new DelegationType(),$Delegation);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { 
        $em->flush();
         $this->addFlash("success", "votre delegation a été modifié avec sucées");
        return $this->redirectToRoute('tuto_delegation');
        //$message="une delegation est modifiée";
        }
        }
        return $this->render('tutoBackofficeBundle:Delegation:modif.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
}
 public function supprimerAction($id)
          {$em=$this->getDoctrine()->getManager();
           $Delegation =$em->find('tutoBackofficeBundle:Delegation',$id);
           if (!$Delegation)
           {
               throw $this->createNotFoundException('Delegation avec l\'id ' .$id.' n\'existe pas');
           }
           $em->remove($Delegation);
           $em->flush();
            $this->addFlash("success", "votre delegation a été supprimé avec sucées");
           return $this->redirectToRoute('tuto_delegation');
           //return new Response("Delegation supprimée avec succées");
          }

}


