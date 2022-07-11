<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\QuestionService;
use tuto\BackofficeBundle\Form\QuestionServiceType;
use Symfony\Component\HttpFoundation\Response;

class QuestionServiceController extends Controller
{
   public function ajoutAction()
    {
        $message="Ajouter une Question";
        $em=$this->getDoctrine()->getManager();
        $QuestionService = new QuestionService();
        $form=$this-> createForm(new QuestionServiceType(),$QuestionService);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { $em->persist($QuestionService);
        $em->flush();
         $this->addFlash("success", "votre question a été ajouté avec succes");
        return $this->redirectToRoute('tuto_questionservices');
       // $message="une Delegation est ajoutée";
        }
        }
        return $this->render('tutoBackofficeBundle:QuestionService:edit.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
    }
     public function afficheAction()
 
     { $em=$this->getDoctrine()->getManager();
       $questionservices =$em->getRepository('tutoBackofficeBundle:QuestionService')->findBy(array(),array('ordre'=>'desc'));
         return $this->render('tutoBackofficeBundle:QuestionService:questionservices.html.twig', array('questionservices'=>$questionservices));
     }
   public function modifierAction($id)
    {
        $message="Modifier une questionservice";
        $em=$this->getDoctrine()->getManager();
         $QuestionService =$em->getRepository('tutoBackofficeBundle:QuestionService')->find($id);
        
        
        $form=$this-> createForm(new QuestionServiceType(),$QuestionService);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
        { 
        $em->flush();
         $this->addFlash("success", "votre question a été modifié avec succes");
        return $this->redirectToRoute('tuto_questionservices');
        //$message="une question est modifiée";
        }
        }
        return $this->render('tutoBackofficeBundle:QuestionService:modif.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
}
 public function supprimerAction($id)
          {$em=$this->getDoctrine()->getManager();
           $QuestionService =$em->find('tutoBackofficeBundle:QuestionService',$id);
           if (!$QuestionService)
           {
               throw $this->createNotFoundException('QuestionService avec l\'id ' .$id.' n\'existe pas');
           }
           $em->remove($QuestionService);
           $em->flush();
            $this->addFlash("success", "votre questionservice a été supprimé avec succes");
           return $this->redirectToRoute('tuto_questionservices');
           //return new Response("QuestionService supprimée avec succées");
          }

}


