<?php 
namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapsController extends Controller
{
    public function mapsAction()
    {
        return $this->render('tutoBackofficeBundle:Maps:maps.html.twig');
    }
}