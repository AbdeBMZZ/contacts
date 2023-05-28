<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter the name of the contact',
                    'class' => 'bg-transparent block border-b-2 w-full h-20 text-3xl outline-none'
                ],
                'label' => false
            ])
            ->add('email', TextType::class, [
                'attr' => [
                    'placeholder' => 'Email address',
                    'class' => 'bg-transparent block border-b-2 w-full h-20 text-3xl outline-none'
                ],
                'label' => false
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'placeholder' => 'Phone number',
                    'class' => 'bg-transparent block border-b-2 w-full h-20 text-3xl outline-none'
                ],
                'label' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
