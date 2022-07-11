<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Categorie1Controller extends Controller {

    public function categorie1Action() {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository("tutoBackofficeBundle:Service")->findAll();
        return $this->render('FrontofficeBundle:Categorie:Categorie1.html.twig', array(
                    'services' => $services));
    }
    
    public function detailsAction(\tuto\BackofficeBundle\Entity\Categorie $categorie)
    {
        return $this->render('FrontofficeBundle:Categorie:details.html.twig', array(
                    'categorie' => $categorie));
    }
    
    
    public function showCategoriesMenuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("tutoBackofficeBundle:Categorie")->findAll();
        return $this->render('FrontofficeBundle:Categorie:menus.html.twig',array(
            'categories'=>$categories
        ));
    }
    
public function NomCategorieAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("tutoBackofficeBundle:Categorie")->findAll();
        return $this->render('FrontofficeBundle:Categorie:nom.html.twig',array(
            'categories'=>$categories
        ));
    }
    public function AfficheAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository("tutoBackofficeBundle:Categorie")->findAll();
        return $this->render('FrontofficeBundle:Categorie:affiche.html.twig',array(
            'categories'=>$categories
        ));
    }
}
