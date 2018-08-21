<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $permissions = [
            'user' => 'ROLE_USER',
            'admin' => 'ROLE_ADMIN',
        ];
        $genders = [
            'male' => 'male',
            'female' => 'female',
        ];

        $builder
            ->add('email', RepeatedType::class, [
                'type' => EmailType::class,
                'options' => [
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => ['class' => 'password-field form-control']
                ],
                'first_options' => ['label' => 'form.email'],
                'second_options' => ['label' => 'form.re-email'],
                'invalid_message' => 'fos_user.email.mismatch',
            ])
            ->add('new_password', RepeatedType::class, [
                'mapped' => false,
                'type' => PasswordType::class,
                'invalid_message' => 'user.new.password_invalid',
                'options' => ['attr' => ['class' => 'password-field form-control']],
                'required' => true,
                'first_options' => ['label' => 'password'],
                'second_options' => ['label' => 'password confirmation'],
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Role',
                'choices' => $permissions,
                'multiple' => false,
                'expanded' => false,
                'mapped' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Gender',
                'choices' => $genders,
                'required'=>false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            ->add('country', CountryType::class, [
                'label' => 'Country',
                'required'=>false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            ->add('birthDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Birth Date',
                'required'=>false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ])

        ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
