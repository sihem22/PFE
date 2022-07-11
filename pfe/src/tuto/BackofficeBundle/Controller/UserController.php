<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\User;
use tuto\BackofficeBundle\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {

    public function ajoutAction() {
        $message = "Ajouter un utilisateur";
        $em = $this->getDoctrine()->getManager();

        $User = new User();
        $form = $this->createForm(new RegistrationType(), $User);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $User=$form->getData();
                $em->persist($User->addRole('ROLE_ADMIN')->setEnabled(true));
                $em->flush();
                $this->addFlash("success", "Votre utilsateur a été ajouté avec succés");
                return $this->redirectToRoute('tuto_user');
            }
        }
        return $this->render('tutoBackofficeBundle:User:edit.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('tutoBackofficeBundle:User')->findAll();
        return $this->render('tutoBackofficeBundle:User:users.html.twig', array('users' => $users));
    }

    public function modifierAction($id) {
        $message = "Modifier un utilisateur";
        $em = $this->getDoctrine()->getManager();
        $User = $em->getRepository('tutoBackofficeBundle:User')->find($id);


        $form = $this->createForm(new RegistrationType(), $User);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                
                $em->persist($User);
                $em->flush();
                   $this->addFlash("success", "Votre utilsateur a été modifié avec succés");
                return $this->redirectToRoute('tuto_user');
                // $message="un utilisateur est modifié";
            }
        }
        return $this->render('tutoBackofficeBundle:User:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
                );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $User = $em->find('tutoBackofficeBundle:User', $id);
        if (!$User) {
            throw $this->createNotFoundException('User avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($User);
        $em->flush();
           $this->addFlash("success", "Votre utilsateur a été supprimé avec succés");
        return $this->redirectToRoute('tuto_user');
        // return new Response("User supprimée avec succées");
    }

}
