<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Program;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ActorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name')
        ->add('programs', EntityType::class, [
            'class' => Program::class,
            'choice_label' => 'title',
            'multiple' => true, 
            'expanded' => true, 
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
        ]);
    }
}