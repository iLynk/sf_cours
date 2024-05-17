<?php

namespace App\Form;

use App\Entity\Cake;
use App\Entity\CakeCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CakeCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la catégorie',
                'required' => false,
                'attr' => [
                    'autofocus' => true,
                    'class' => 'form-control',
                ],
            ])
            ->add('active', CheckboxType::class, [
                'label' => 'Afficher la catégorie',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('cakes', EntityType::class, [
                'label' => 'Gâteaux associés',
                'required' => false,
                'class' => Cake::class,
                'choice_label' => 'name',
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CakeCategory::class,
        ]);
    }
}