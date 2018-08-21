<?php

namespace AppBundle\Form;


use AppBundle\Entity\Department;
use AppBundle\Entity\Driver;
use AppBundle\Entity\GasStation;
use AppBundle\Entity\Project;
use AppBundle\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SearchReconciliationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('firstDate',DateType::class,array(
                'label'=> 'Start Date :',
                'required'=>false,
                'placeholder' => 'Select a value',
                'widget' => 'single_text',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('secondDate',DateType::class,array(
                'label'=> 'End Date :',
                'required'=>false,
                'placeholder' => 'Select a value',
                'widget' => 'single_text',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('department',EntityType::class,array(
                'class' => Department::class,
                'required'=>false,
                'choice_label' => 'name',
                'placeholder' => 'Select a value',
                'attr' => array(
                    'class'=>'bootstrap-select',
                    'data-live-search'=>'true',
                    'data-width'=>'100%',
                )
            ))

            ->add('driver',EntityType::class,array(
                'class' => Driver::class,
                'required'=>false,
                'choice_label' => 'lastName',
                'placeholder' => 'Select a value',
                'attr' => array(
                    'class'=>'bootstrap-select',
                    'data-live-search'=>'true',
                    'data-width'=>'100%',
                )
            ))
       
            ->add('project',EntityType::class,array(
                'class' => Project::class,
                'required'=>false,
                'choice_label' => 'name',
                'placeholder' => 'Select a value',
                'attr' => array(
                    'class'=>'bootstrap-select',
                    'data-live-search'=>'true',
                    'data-width'=>'100%',
                )
            ))
            ->add('vehicle',EntityType::class,array(
                'class' => Vehicle::class,
                'required'=>false,
                'choice_label' => function (Vehicle $vehicle) {
                    return $vehicle->getMat() . ' - ' . $vehicle->getType();
                },
                'placeholder' => 'Select a value',
                'attr' => array(
                    'class'=>'bootstrap-select',
                    'data-live-search'=>'true',
                    'data-width'=>'100%',
                )
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_searchreconciliation';
    }


}
