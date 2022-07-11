<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\User;
use tuto\BackofficeBundle\Form\RegistrationType2;
use Symfony\Component\HttpFoundation\Response;

class User2Controller extends Controller {

    public function ajout2Action() {
        $message = "Ajouter un utilisateur";
        $em = $this->getDoctrine()->getManager();

        $User = new User();
        $form = $this->createForm(new RegistrationType2(), $User);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $User=$form->getData();
                $em->persist($User->addRole('ROLE_PROF')->setEnabled(true));
                $em->flush();
               $this->addFlash("success", "Votre compte entreprise a eté crée avec succés");
                 return $this->redirectToRoute('sign_up');

            }
        }
        return $this->render('FrontofficeBundle:User:ajouter.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
                );
    }
   
     
}
