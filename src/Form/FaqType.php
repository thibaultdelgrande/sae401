<?php

namespace App\Form;

use App\Entity\Faq;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FaqType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('question' , TextType::class ,[
                'attr' => [
                    'placeholder' => 'Enter the question',
                    'class' => 'form-control',
                    'minlength' => '3',
                    'maxlength' => '50'
                ],
                'label' => 'Question',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter question',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Your question should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                    ]),
                ],
            ])
            ->add('answer', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter the answer to the question',
                    'class' => 'form-control',
                    'minlength' => '3',
                    'maxlength' => '511'
                ],
                'label' => 'Answer',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an answer',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Your description should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 511,
                    ]),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ],
                'label' => 'Submit'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Faq::class,
        ]);
    }
}
