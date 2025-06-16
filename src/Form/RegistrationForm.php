<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'common__login__input'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an email',
                    ]),
                    new Email([
                        'message' => 'Please enter a valid email address',
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'attr' => ['class' => 'common__login__input']
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'The password fields must match.',
                'first_options'  => [
                    'label' => 'Password',
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'class' => 'common__login__input',
                        'placeholder' => 'Password',
                    ],
                    'toggle' => true,
                ],
                'second_options' => [
                    'label' => 'Re-Enter Password',
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'class' => 'common__login__input',
                        'placeholder' => 'Re-Enter Password',
                    ],
                    'toggle' => true,
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('firstName', TextType::class, [
                'attr' => ['class' => 'common__login__input'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your first name',
                    ]),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'First name cannot be longer than {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('lastName', TextType::class, [
                'attr' => ['class' => 'common__login__input'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your last name',
                    ]),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Last name cannot be longer than {{ limit }} characters',
                    ]),
                ],
            ])
            ->add('userName', TextType::class, [
                'attr' => ['class' => 'common__login__input'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a username',
                    ]),
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Username cannot be longer than {{ limit }} characters',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
