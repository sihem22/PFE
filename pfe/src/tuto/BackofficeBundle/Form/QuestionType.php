<?php

namespace tuto\BackofficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('libelle', 'text')
                ->add('TypeQuestion', 'choice', array(
                    'choices' => array(
                        'text' => 'Text',
                        'number' => 'number',
                        'select' => 'select',
                        'checkbox' => 'checkbox',
                        'radiobox' => 'radiobox',
                        'textarea' => 'textarea',
                        'datePicker' => 'datepicker',
                        'timePicker' => 'timePicker',
                    ),
                        ))
                ->add('ValeursDefault')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'tuto\BackofficeBundle\Entity\Question'
        ));
    }

}
