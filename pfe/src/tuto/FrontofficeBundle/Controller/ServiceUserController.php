<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;

class ServiceUserController extends Controller {

    public function serviceuserAction(\Symfony\Component\HttpFoundation\Request $request) {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        if ($request->isMethod('POST')) {
            foreach ($request->request->get('avc') as $id) {
                $service = $em->getRepository('tutoBackofficeBundle:Service')->find($id);
                $user->addService($service);
            }
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('serviceuser_affiche');
        }
        return $this->render('FrontofficeBundle:ServiceUser:serviceuser.html.twig', array(
                    'categories' => $em->getRepository("tutoBackofficeBundle:Categorie")->findAll()
        ));
    }

    public function afficheAction() {
        return $this->render('FrontofficeBundle:ServiceUser:affiche.html.twig', array(
                    'user' => $this->getUser()));
    }

}
