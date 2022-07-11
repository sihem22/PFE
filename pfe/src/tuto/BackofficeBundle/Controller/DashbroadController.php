<?php 
namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashbroadController extends Controller
{
    public function dashbroadAction()
    {   
    	$em = $this->getDoctrine()->getManager();

    	$Categorie = $em->getRepository("tutoBackofficeBundle:Categorie")->findAll();
    	$nb=array();
    	foreach ($Categorie as $categorie){
    		$nb[]=array(
    			'categorie'=>$categorie,
    			'count'=>$em->getRepository("tutoBackofficeBundle:Demande")->getNb($categorie)
    			);
    	}
    	
    	return $this->render('tutoBackofficeBundle:Dashbroad:dashbroad.html.twig',array('nb'=>$nb));
    }
     public function scriptAction()
    {   
    	$em = $this->getDoctrine()->getManager();

    	$Categorie = $em->getRepository("tutoBackofficeBundle:Categorie")->findAll();
    	$nb=array();
    	foreach ($Categorie as $categorie){
    		$nb[]=array(
    			'categorie'=>$categorie,
    			'count'=>$em->getRepository("tutoBackofficeBundle:Demande")->getNb($categorie)
    			);
    	}
    	
    	return $this->render('tutoBackofficeBundle:Dashbroad:script.html.twig',array('nb'=>$nb));
    }
    public function dashbroad2Action()
    {   
        $em = $this->getDoctrine()->getManager();

        $Categorie = $em->getRepository("tutoBackofficeBundle:Categorie")->findAll();
        $nb=array();
        foreach ($Categorie as $categorie){
            $nb[]=array(
                'categorie'=>$categorie,
                'count'=>$em->getRepository("tutoBackofficeBundle:Demande")->getNbprop($categorie)
                );
        }
        
        return $this->render('tutoBackofficeBundle:Dashbroad:dashbroad.html.twig',array('nb'=>$nb));
    }

    

     public function scriptpropAction()
    {   
        $em = $this->getDoctrine()->getManager();

        $Categorie = $em->getRepository("tutoBackofficeBundle:Categorie")->findAll();
        $nb=array();
        foreach ($Categorie as $categorie){
            $nb[]=array(
                'categorie'=>$categorie,
                'count'=>$em->getRepository("tutoBackofficeBundle:proposition")->getNbprop($categorie)
                );
        }
        
        return $this->render('tutoBackofficeBundle:Dashbroad:scriptprop.html.twig',array('nb'=>$nb));
    }
    public function getNbclientAction()       
       {    $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("tutoBackofficeBundle:User")->findAll();
         $nb=array();
        foreach ($user as $user){
            if ($user->hasRole('ROLE_CLIENT'))
           { $nb[]=array(
                'user'=>$user,
                'count'=>$em->getRepository("tutoBackofficeBundle:User")->getNbprof('ROLE_CLIENT')
                );}
        }
        
       
        return $this->render('tutoBackofficeBundle:Dashbroad:script.html.twig', array('nb' => $nb));
        }

  public function getNbprofAction()       
       {    $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("tutoBackofficeBundle:User")->findAll();
         $nb=array();
        foreach ($user as $user){
            if ($user->hasRole('ROLE_PROF'))
           { $nb[]=array(
                'user'=>$user,
                'count'=>$em->getRepository("tutoBackofficeBundle:User")->getNbprof('ROLE_PROF')
                );}
        }
        
       
        return $this->render('tutoBackofficeBundle:Dashbroad:script.html.twig', array('nb' => $nb));
        }

        
   public function getNbadminAction()       
       {    $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("tutoBackofficeBundle:User")->findAll();
         $nb=array();
        foreach ($user as $user){
            if ($user->hasRole('ROLE_ADMIN'))
           { $nb[]=array(
                'user'=>$user,
                'count'=>$em->getRepository("tutoBackofficeBundle:User")->getNbprof('ROLE_ADMIN')
                );}
        }
        
       
        return $this->render('tutoBackofficeBundle:Dashbroad:script.html.twig', array('nb' => $nb));
        }
}