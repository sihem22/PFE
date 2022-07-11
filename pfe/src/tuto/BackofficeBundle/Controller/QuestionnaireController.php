<?php

namespace tuto\BackofficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuestionnaireController extends Controller {

    public function questionnaireAction(\tuto\BackofficeBundle\Entity\Service $service, \Symfony\Component\HttpFoundation\Request $request) {
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod('POST')) {
            //ajout questionnaire
            $demande = new \tuto\BackofficeBundle\Entity\Demande();
            $demande->setDateDemande(new \DateTime());
            $demande->setUser($this->getUser());

            $demande->setEtat($em->getRepository("tutoBackofficeBundle:Etat")->findOneById('4'));
            $demande->setService($service);
            $demande->setVisible(true);
            //$demande-> setLocalite(sxxsxs);
            $em->persist($demande);
            $em->flush();

            $i = 1;
            foreach ($service->getQuestionservices() as $questionService) {
                $demandeReponse = new \tuto\BackofficeBundle\Entity\DemandeReponse();
                $demandeReponse
                        ->setDemande($demande)
                        ->setQuestion($questionService->getQuestion())
                        ->setReponse($request->request->get('question_' . $i));
                $em->persist($demandeReponse);
                $i++;
            }
            $em->flush();
            $this->addFlash("succees", "succes");
            return $this->redirectToRoute("tuto_demande");
        }

        return $this->render('tutoBackofficeBundle:Questionnaire:questionnaire.html.twig', array(
                    'service' => $service
        ));
    }


}
