<?php

namespace AppBundle\Form;

use AppBundle\Entity\Department;
use AppBundle\Entity\Driver;
use AppBundle\Entity\GasStation;
use AppBundle\Entity\Project;
use AppBundle\Entity\Vehicle;
use function Sodium\add;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FuelReconciliationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $yesOrNo = [
            'NO' => false,
            'YES' => true,
        ];

        $builder

            ->add('liters',null,array(
                'label' => 'number of liters',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('tauxByLiter',null,array(
                'label' => 'price per 1L',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            
            ->add('isPayed', ChoiceType::class, [
                'label' => 'Payed',
                'choices' => $yesOrNo,
                'attr' => array(
                    'class' => 'form-control'
                )
            ])

            ->add('department',EntityType::class,array(
                'class' => Department::class,
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
                'choice_label' => 'lastName',
                'placeholder' => 'Select a value',
                'attr' => array(
                    'class'=>'bootstrap-select',
                    'data-live-search'=>'true',
                    'data-width'=>'100%',
                )
            ))
            ->add('gasStation',EntityType::class,array(
                'required'=>false,
                'class' => GasStation::class,
                'choice_label' => 'name',
                'placeholder' => 'Select a value',
                'attr' => array(
                    'class'=>'bootstrap-select',
                    'data-live-search'=>'true',
                    'data-width'=>'100%',
                )
            ))
            ->add('project',EntityType::class,array(
                'class' => Project::class,
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
                'choice_label' => 'mat',
                'placeholder' => 'Select a value',
                'attr' => array(
                    'class'=>'bootstrap-select',
                    'data-live-search'=>'true',
                    'data-width'=>'100%',
                )
            ))

            ->add('remarks',TextareaType::class,array(
                'required'=>false,
                'label' => 'Remark',
                'attr' => array('class' => 'form-control'),
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FuelReconciliation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_fuelreconciliation';
    }


}
