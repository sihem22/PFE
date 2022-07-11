<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDemande', 'date', array('widget'=>'single_text','format'=>'yyyy-MM-dd'),array('disabled' => true))
            ->add('user','text',array('disabled' => true) ) 
            ->add('etat','entity',array('class'=>'tutoBackofficeBundle:Etat','choice_label'=>'libelle'))
            ->add('service','text',array('disabled' => true) )
            ->add('localite','text',array('disabled' => true) )
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\Demande'
        ));
    }
}

