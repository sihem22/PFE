<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\User;
use tuto\BackofficeBundle\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Response;

class ProfController extends Controller {

    public function ajoutAction() {
        $message = "Ajouter un utilisateur";
        $em = $this->getDoctrine()->getManager();
        $User = new User();
        $form = $this->createForm(new RegistrationType(), $User,array('validation_groups'=>'Registration'));
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $User = $form->getData();
                $em->persist($User->addRole('ROLE_PROF')->setEnabled(true));
                $em->flush();
                $this->addFlash("success", "Votre compte professionnel a eté crée avec succés");
                return $this->redirectToRoute('sign_up');
            }
        }
        return $this->render('FrontofficeBundle:Prof:edit.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }
    
   public function usersAction() {
     return $this->render('FrontofficeBundle:Prof:affiche.html.twig', array(
                    'user' => $this->getUser()));
   }
}
