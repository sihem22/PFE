<?php namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('tutoBackofficeBundle:Default:index.html.twig');
    }


    public function sendmailAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        
        if($request->getMethod()=="POST")
      
            $Subject = $request->request->get('Subject');
      $email = $request->request->get('email');
        $message = $request->request->get('message');
       
         $mailer = $this->container->get('mailer');
         $transport= \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,' ssl')
         ->setUsername('yahia1.sarra2@gmail.com')->setPassword('soussousissi1');
         
           $mailer=  \Swift_Mailer::newInstance($transport);
           $message = \Swift_Message::newInstance()   
                ->setSubject('Small Jobs Mall ')
                ->setFrom('yahia1.sarra2@gmail.com')
                ->setTo($email)
               ->setBody('votre demande a été validé avec succés !')
        ;      
       
       $this->get('mailer')->send($message);
     
      return $this->render('tutoBackofficeBundle:Default:mail.html.twig');;
        
    }
}
