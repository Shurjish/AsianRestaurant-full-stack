<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('people', IntegerType::class)
            ->add('phone', TextType::class)
            ->add('email', EmailType::class)
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('hour', ChoiceType::class, [
                'choices' => [
                    '12:00 PM' => '12:00',
                    '1:30 PM' => '13:30',
                    '3:00 PM' => '15:00',
                    '4:30 PM' => '16:30',
                    '6:00 PM' => '18:00',
                    '7:30 PM' => '19:30',
                    '9:00 PM' => '21:00',
                    '10:30 PM' => '22:30',
                ],
            ])
            ->add('comments', TextareaType::class)

            ->add('Reserve', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
