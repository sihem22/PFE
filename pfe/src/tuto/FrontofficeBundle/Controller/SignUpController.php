<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SignUpController extends Controller
{
    public function signupAction()
    {
        return $this->render('FrontofficeBundle:SignUp:signup.html.twig');
    }
     public function SignUpProfAction()
    {
        return $this->render('FrontofficeBundle:SignUpProf:signupprof.html.twig');
    }
}
