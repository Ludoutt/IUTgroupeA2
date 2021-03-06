<?php

namespace App\Form;

use App\Entity\Element;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElementDevNewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array('label'=>'Titre de l\'élément'))
            ->add('description', TextareaType::class, array('label'=>'Description de l\'élément'))
            ->add('type',ChoiceType::class, array('label'=>'Type de l\'élément', 'choices'=>array(
                'Feature'=>'feature',
                'Correction'=>'correction',
                'Users Stories'=>'userstory'
            )))
            ->add('position',IntegerType::class, array('label'=>'Ordonnencement de l\'élément'))
            ->add('complexity',IntegerType::class, array('label'=>'Points de complexité'))
            ->add('nbHours',IntegerType::class, array('label'=>'Nombre d\'heures estimé'))
            ->add('acceptationCriteria', TextareaType::class, array('label'=>'Critères d\'acceptations'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Element::class,
        ]);
    }
}
