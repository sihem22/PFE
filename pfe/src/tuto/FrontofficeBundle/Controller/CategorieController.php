<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller {

    public function categorieAction() {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("tutoBackofficeBundle:Categorie")->findAll();
        return $this->render('FrontofficeBundle:Categories:categories.html.twig', array(
                    'categories' => $categories));
    }
      public function categorieprofilAction() {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("tutoBackofficeBundle:Categorie")->findAll();
        return $this->render('FrontofficeBundle:Categories:categorieProfil.html.twig', array(
                    'categories' => $categories));
    }
}