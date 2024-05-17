<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('senderName', TextType::class, [
                'label' => 'Votre prénom',
                'required' => false,
                'attr' => [
                    'autofocus' => true,
                    'placeholder' => 'Ex: John',
                    'class' => 'form-control',
                ],
            ])
            ->add('senderEmail', EmailType::class, [
                'label' => 'Votre email',
                'attr' => [
                    'placeholder' => 'john@doe.fr',
                    'class' => 'form-control',
                ],
            ])
            ->add('subject', TextType::class, [
                'label' => 'Sujet de votre demande',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => "Je veux créer un gateau"
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Bonjour, ',
                    'rows' => 7,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}