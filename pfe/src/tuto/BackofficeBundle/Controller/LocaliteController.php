<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Localite;
use tuto\BackofficeBundle\Form\LocaliteType;
use Symfony\Component\HttpFoundation\Response;

class LocaliteController extends Controller {

    public function ajoutAction() {
        $message = "Ajouter une Localite";
        $em = $this->getDoctrine()->getManager();
        $Localite = new Localite();
        $form = $this->createForm(new LocaliteType(), $Localite);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->persist($Localite);
                $em->flush();
                
                $this->addFlash("success", "votre localité a été ajouté avec sucées");
                return $this->redirectToRoute('tuto_localite');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Localite:edit.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
                );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $localites = $em->getRepository('tutoBackofficeBundle:Localite')->findAll();
        return $this->render('tutoBackofficeBundle:Localite:localites.html.twig', array('localites' => $localites));
    }

    public function modifierAction($id) {
        $message = "Modifier une localite";
        $em = $this->getDoctrine()->getManager();
        $Localite = $em->getRepository('tutoBackofficeBundle:Localite')->find($id);


        $form = $this->createForm(new LocaliteType(), $Localite);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request); {
            if ($form->isValid()) {
                $em->flush();
                $this->addFlash("success", "votre localité a été modifié avec sucées");
                return $this->redirectToRoute('tuto_localite');
                // $message="une localite est modifiée";
            }
        }
        return $this->render('tutoBackofficeBundle:Localite:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
                );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Localite = $em->find('tutoBackofficeBundle:Localite', $id);
        if (!$Localite) {
            throw $this->createNotFoundException('Localite avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Localite);
        $em->flush();
        $this->addFlash("success", "votre localité a été supprimé avec sucées");
        return $this->redirectToRoute('tuto_localite');
        // return new Response("Localite supprimée avec succées");
    }

}
