<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('non')
            ->add('prenom')
            ->add('email')
            ->add('login')
            ->add('mdp')
            ->add('adresse')
            ->add('phone')
            ->add('dateNaiss')
            ->add('sexe')
            ->add('rating')
            ->add('nbArtEch')
            ->add('nbArtPos')
            ->add('role')
            ->add('image')
            ->add('idUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
