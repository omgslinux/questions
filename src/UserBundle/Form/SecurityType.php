<?php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

class SecurityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['showLogin']) {
          $builder
          ->add('_username', TextType::class,
            [
              'required' => true,
              'label' => 'Username'
            ]
          )
          ->add('_password', PasswordType::class,
            [
              'required' => true,
              'label' => 'Password',
            ]
          )
          ->add('login', SubmitType::class,
            [
              'label' => 'Login'
            ]
          )
          ;
        }  else {
          $builder
          ->add('plainPassword', RepeatedType::class,
            [
              'type' => PasswordType::class,
              'required' => false,
              'label' => 'Enter password',
              'first_options' =>
              [
                'label' => 'Password',
              ],
              'second_options' =>
              [
                'label' => 'Confirm password',
              ],
            ]
          );

        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
          [
            'data_class' => 'UserBundle\Entity\Security',
            'showLogin' => false
          ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'userbundle_security';
    }


}
