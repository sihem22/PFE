<?php


namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\User;
use tuto\BackofficeBundle\Form\RegistrationType2;
use Symfony\Component\HttpFoundation\Response;
class EntrepriseController extends Controller{
    
    public function modifierAction() {
        $message = "Modifier un utilisateur";
        $em = $this->getDoctrine()->getManager();
         $User = $em->getRepository('tutoBackofficeBundle:User')->find($this->getUser()->getId());


        $form = $this->createForm(new RegistrationType2(), $User);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->flush();
                   $this->addFlash("success", "Votre utilsateur a été modifié avec succés");
                return $this->redirectToRoute('fos_user_profile_show');
                // $message="un utilisateur est modifié";
            }
        }
        return $this->render('FrontofficeBundle:EspaceEntreprise:modifier.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
                );
    }
    
}

