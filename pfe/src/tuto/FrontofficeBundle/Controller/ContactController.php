<?php



namespace tuto\FrontofficeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Contact;
use tuto\BackofficeBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;


class ContactController extends Controller {
    public function ajoutAction()
    {
        $message="Ajouter une Categorie";
        $em=$this->getDoctrine()->getManager();
        $Contact = new Contact();
        $form=$this-> createForm(new ContactType(),$Contact);
        $request=$this->getRequest();
        if ( $request->getMethod()=='POST')
            $form->handleRequest($request);
            
        { if ($form->isValid())
             
        { $em->persist($Contact);
        $em->flush();
       
        $Contact=$form->getData();
        $this->addFlash("success", "votre email a été envoyé avec succés , merci pour nous contacter");
        return $this->redirectToRoute('front_contact');
        // $message="une Categorie est ajoutée";
        }
        }
        return $this->render('FrontofficeBundle:Contact:ajout.html.twig', array(
                'form'=>$form->createView() , 
                  'msg'=>$message ,
        )
        ) ;
    }
    //put your code here
}
