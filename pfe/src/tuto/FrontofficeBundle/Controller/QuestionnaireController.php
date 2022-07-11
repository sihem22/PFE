<?php

namespace tuto\FrontofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuestionnaireController extends Controller {

    public function questAction(\tuto\BackofficeBundle\Entity\Service $service, \Symfony\Component\HttpFoundation\Request $request) {
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod('POST')) {
            //ajout questionnaire
            $demande = new \tuto\BackofficeBundle\Entity\Demande();
            $demande->setDateDemande(new \DateTime());
            $demande->setUser($this->getUser());

            $demande->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('4'));
            $demande->setService($service);
            //$demande-> setLocalite(sxxsxs);
            $em->persist($demande);

            $i = 1;
            foreach ($service->getQuestionservices() as $questionService) {
                $demandeReponse = new \tuto\BackofficeBundle\Entity\DemandeReponse();
                //dump($request->request->get('question_' . $i));
                $resps = "";
                if (is_array($request->request->get('question_' . $i))) {
                    foreach ($request->request->get('question_' . $i) as $data)
                        $resps.="  /  " . $data;
                    $resps=  substr($resps, 5);
                } else
                    $resps = $request->request->get('question_' . $i);
                $demandeReponse
                        ->setDemande($demande)
                        ->setQuestion($questionService->getQuestion())
                        ->setReponse($resps);

                $em->persist($demandeReponse);
                $i++;
            }
            //exit();
            /**
             * notification
             */
            $em->flush();
            $this->addFlash("succees", "succes");
            return $this->redirectToRoute('front_reponsesSucces', array(
                        'demande' => $demande->getId()
            ));
        }

        return $this->render('FrontofficeBundle:Quest:quest.html.twig', array(
                    'service' => $service
        ));
    }

    public function succesAction(\tuto\BackofficeBundle\Entity\Demande $id, \tuto\BackofficeBundle\Entity\Notification $notifId) {
        $em = $this->getDoctrine()->getManager();
        $demandereponse = $em->getRepository('tutoBackofficeBundle:DemandeReponse')->findBy(array('demande' => $id));
        $notification = $em->find("tutoBackofficeBundle:Notification", $notifId);
        $notification->setLu(true);
        $em->persist($notification);
        $em->flush();
        return $this->render('FrontofficeBundle:Quest:affiche.html.twig', array('demandereponse' => $demandereponse));
    }

    public function reponsesAction(\tuto\BackofficeBundle\Entity\Demande $demande) {
        $em = $this->getDoctrine()->getManager();
        $demandereponse = $em->getRepository('tutoBackofficeBundle:DemandeReponse')->findBy(array('demande' => $demande));
        return $this->render('FrontofficeBundle:Quest:affiche.html.twig', array('demandereponse' => $demandereponse));
    }

}
