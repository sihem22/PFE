<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use tuto\BackofficeBundle\Entity\Service;
use tuto\BackofficeBundle\Form\ServiceType;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller {

    public function ajoutAction() {
        $message = "Ajouter une Service";
        $em = $this->getDoctrine()->getManager();
        $Service = new Service();
        $form = $this->createForm(new ServiceType(), $Service);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request);
        {
            if ($form->isValid()) {
                $em->persist($Service);
                $em->flush();
                $this->addFlash("success", "votre service a été ajouté avec succés");
                return $this->redirectToRoute('tuto_service');
                // $message="une Delegation est ajoutée";
            }
        }
        return $this->render('tutoBackofficeBundle:Service:edit.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function afficheAction() {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository('tutoBackofficeBundle:Service')->findAll();
        return $this->render('tutoBackofficeBundle:Service:services.html.twig', array('services' => $services));
    }

    public function modifierAction($id) {
        $message = "Modifier une service";
        $em = $this->getDoctrine()->getManager();
        $Service = $em->getRepository('tutoBackofficeBundle:Service')->find($id);


        $form = $this->createForm(new ServiceType(), $Service);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST')
            $form->handleRequest($request);
        {
            if ($form->isValid()) {
                $em->flush();
                $this->addFlash("success", "votre question a été modifié avec succes");
                return $this->redirectToRoute('tuto_service');
                // $message="une service est modifiée";
            }
        }
        return $this->render('tutoBackofficeBundle:Service:modif.html.twig', array(
                    'form' => $form->createView(),
                    'msg' => $message,
                        )
        );
    }

    public function supprimerAction($id) {
        $em = $this->getDoctrine()->getManager();
        try {
            $Service = $em->find('tutoBackofficeBundle:Service', $id);
            $em->remove($Service);
            $em->flush();
            $this->addFlash("success", "votre question a été supprimé avec succes");
        } catch (\Exception $ex) {
            $this->addFlash("danger", $ex->getMessage());
        }
        return $this->redirectToRoute('tuto_service');
    }

}
