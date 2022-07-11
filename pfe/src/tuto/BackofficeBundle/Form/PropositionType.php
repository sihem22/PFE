<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropositionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
           ->add('dateProposition')
            ->add('prix')
            ->add('fprix')
            ->add('message')
            ->add('etat','entity',array('class'=>'tutoBackofficeBundle:Etat','choice_label'=>'libelle'))
            ->add('user')
            ->add('demande','entity',array('class'=>'tutoBackofficeBundle:Demande','choice_label'=>'id'))
                ;
        
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\Proposition'
        ));
    }
}
