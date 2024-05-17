<?php

namespace App\Form;

use App\Entity\Cake;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CakeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du gâteau',
                'attr' => [
                    'autofocus' => true,
                    'class' => 'form-control',
                ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Image du gâteau',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Veuillez choisir un fichier image : JPG, PNG ou WebP',
                        'maxSizeMessage' => 'Votre fichier est trop gros !',
                    ]),
                ],
            ])
            ->add('active', CheckboxType::class, [
                'label' => 'Afficher le gâteau',
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('category', EntityType::class, [
                'label' => 'Catégorie associée',
                'class' => 'App\Entity\CakeCategory',
                'choice_label' => 'name',
                'placeholder' => 'Choisissez une catégorie',
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cake::class,
        ]);
    }
}