<?php

// src/BackofficeBundle/Form/RegistrationType.php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('NomEtPrenom', 'text', array('required' => true));
        $builder->add('DateNaissance', 'date', array('widget'=>'single_text','format'=>'yyyy-MM-dd'),
             array('required' => true));
        $builder->add('Genre', 'choice', array('choices' => array('H' => 'Homme', 'F' => 'Femme'), 'expanded' => true), array('required' => true));
        $builder->add('Telephone', 'text', array('required' => true));
        $builder->add('image', 'file', array('required' => false));
        $builder->add('SiteWeb', 'text', array('required' => false));
        $builder->add('Localite', 'entity', array('class' => 'tutoBackofficeBundle:Localite', 'choice_label' => 'libelle',), array('required' => true));
    }

    public function getParent() {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix() {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getNomEtPrenom() {
        return $this->getBlockPrefix();
    }

    public function getDateNaissance() {
        return $this->getBlockPrefix();
    }

    public function getGenre() {
        return $this->getBlockPrefix();
    }

    public function getTelephone() {
        return $this->getBlockPrefix();
    }

    public function getImage() {
        return $this->getBlockPrefix();
    }

    public function getSiteWeb() {
        return $this->getBlockPrefix();
    }

    public function getA_propos() {
        return $this->getBlockPrefix();
    }

    public function getIsConfirmed() {
        return $this->getBlockPrefix();
    }

    public function getAnneeExperience() {
        return $this->getBlockPrefix();
    }

}
