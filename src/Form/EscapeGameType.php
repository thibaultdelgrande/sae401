<?php

namespace App\Form;

use App\Entity\EscapeGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class EscapeGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre' , TextType::class ,[
                'attr' => [
                    'placeholder' => 'Enter the name of the escape game',
                    'class' => 'form-control',
                    'minlength' => '3',
                    'maxlength' => '50'
                ],
                'label' => 'Name',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a name',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Your name should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                    ]),
                ],
            ])
            ->add('description', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter the description of the escape game',
                    'class' => 'form-control',
                    'minlength' => '3',
                    'maxlength' => '255'
                ],
                'label' => 'Description',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a description',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Your description should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 255,
                    ]),
                ],
            ])
            ->add('duree', TimeType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Duration',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a duration',
                    ]),
                ],
                'input' => 'datetime_immutable',
            ])
            ->add('nombreJoueursMax', IntegerType::class, [
                'attr' => [
                    'placeholder' => 'Enter the maximum number of players',
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 100,
                ],
                'label' => 'Maximum number of players',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter the maximum number of players',
                    ]),
                    new Range([
                        'min' => 1,
                        'max' => 100,
                        'notInRangeMessage' => 'Please enter a number between {{ min }} and {{ max }}',
                    ]),
                ],
            ])
            ->add('image', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter the image of the escape game',
                    'class' => 'form-control',
                    'minlength' => '3',
                    'maxlength' => '255'
                ],
                'label' => 'Image',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an image',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Your image should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 255,
                    ]),
                ],
            ])
            ->add('prix', MoneyType::class, [
                'attr' => [
                    'placeholder' => 'Enter the price of the escape game',
                    'class' => 'form-control',
                    'min' => 1,
                    'max' => 100,
                ],
                'label' => 'Price',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a price',
                    ]),
                    new Range([
                        'min' => 0,
                        'max' => 100,
                        'notInRangeMessage' => 'Please enter a number between {{ min }} and {{ max }}',
                    ]),
                ],
                'currency' => 'EUR',

            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
                'label' => 'Submit',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EscapeGame::class,
        ]);
    }
}
