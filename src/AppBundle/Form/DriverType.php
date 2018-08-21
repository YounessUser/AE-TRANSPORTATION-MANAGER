<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DriverType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',null,array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('lastName',null,array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('cin',null,array(
                'label' => 'CIN',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('permit',null,array(
                'label' => 'License number (Numéro de permis):',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))

            ->add('address',null,array(
                'required'=>false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('birthDate',DateType::class, array(

                'placeholder' => 'Select a value',
                'widget' => 'single_text',
                'required'=>false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Driver'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_driver';
    }


}
