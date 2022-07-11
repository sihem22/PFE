<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Categorie;
use tuto\BackofficeBundle\Form\CategorieType;
use Symfony\Component\HttpFoundation\Response;

class CategorieController extends Controller {

    public function ajoutAction() {
        $message = "Ajouter une Categorie";
        $em = $this->getDoctrine()->getManager();
        $Categorie = new Categorie();
        $form = $this->createForm(new CategorieType(), $Categorie);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request);
        {
            if ($form->isValid()) {
                $em->persist($Categorie);
                $em->flush();

                $Categorie = $form->getData();
                $this->addFlash("success", "votre categorie a été ajouté avec sucées");
                return $this->redirectToRoute('tuto_categorie');
                // $message="une Categorie est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Categorie:edit.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('tutoBackofficeBundle:Categorie')->findAll();
        return $this->render('tutoBackofficeBundle:Categorie:categories.html.twig', array('categories' => $categories));
    }

    public function modifierAction($id) {
        $message = "Modifier une categorie";
        $em = $this->getDoctrine()->getManager();
        $Categorie = $em->getRepository('tutoBackofficeBundle:Categorie')->find($id);


        $form = $this->createForm(new CategorieType(), $Categorie);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {

            $form->handleRequest($request);
            if (true) {
                $Categorie = $form->getData();
                $em->persist($Categorie);
                $em->flush();
                $this->addFlash("success", "votre categorie a été modifié avec sucées");
                return $this->redirectToRoute('tuto_categorie');
                //$message="une categorie est modifiée";
            }
        }
        return $this->render('tutoBackofficeBundle:Categorie:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        $Categorie = $em->find('tutoBackofficeBundle:Categorie', $id);
        if (!$Categorie) {
            throw $this->createNotFoundException('Categorie avec l\'id ' . $id . ' n\'existe pas');
        }
        $em->remove($Categorie);
        $em->flush();
        $this->addFlash("success", "votre categorie a été supprimé avec sucées");
        return $this->redirectToRoute('tuto_categorie');

        //return new Response("Categorie supprimée avec succées");
    }

}
