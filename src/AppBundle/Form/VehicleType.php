<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mat',null,array(
                'label'=>'VEHICLE REG :',
                'attr'=>array(
                    'class'=> 'form-control'
                )
            ))
            ->add('kilometrage',null,array(
                'required'=>false,
                'label' => 'Mileage :',
                'attr'=>array(
                    'class'=> 'form-control'
                )
            ))
            ->add('type',null,array(
                
                'label'=>'Type Vehicle :',
                'attr'=>array(
                    'class'=> 'form-control'
                )
            ))
            ->add('brand',null,array(
                'required'=>false,
                'label'=>'Vehicle Brand :',
                'attr'=>array(
                    'class'=> 'form-control'
                )
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Vehicle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_vehicle';
    }


}
