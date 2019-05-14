<?php

namespace App\Form;

use App\Entity\GrumpyElephant;
use App\Entity\TinyPuppy;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GrumpyElephantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class)
            ->add('tinyPuppy', EntityType::class, ['class' => TinyPuppy::class, 'choice_label' => 'name', 'required' => false, 'placeholder' => 'Nothing'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GrumpyElephant::class,
        ]);
    }
}
