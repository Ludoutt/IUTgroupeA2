<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array('label' => 'Prénom ') )
            ->add('lastname', null, array('label' => 'Nom '))
            ->add('email', EmailType::class, array('label' => 'Adresse mail '))
            ->add('password', PasswordType::class, array('label' => 'Mot de passe '))
            ->add('role', ChoiceType::class, [
                'label' => 'Rôle ',
                'choices' => [
                    'Product Owner' => 'ROLE_PRODUCT_OWNER',
                    'Developer' => 'ROLE_DEV'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
