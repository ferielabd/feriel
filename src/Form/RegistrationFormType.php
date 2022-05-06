<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends \Symfony\Component\Form\AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('login',TextType::class)
            ->add('mdp',PasswordType ::class)
            ->add('adresse')
            ->add('phone')
            ->add('dateNaiss')
            ->add('sexe', ChoiceType::class, [
                'choices'  => [
                    'Selectionnez' => null,
                    'male' => true,
                    'femelle' => true,
                ],
            ])

            ->add('image',FileType::class, array('label'=>'Upload Image')
            )

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }


}