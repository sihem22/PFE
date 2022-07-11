<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FAQController extends Controller
{
    public function faqAction()
    {
        return $this->render('FrontofficeBundle:FAQ:faq.html.twig');
    }
}
