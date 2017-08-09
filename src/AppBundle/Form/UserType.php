<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Rol;
use Doctrine\ORM\EntityRepository;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $showStudent = ($options['showStudent'] ? $options['showStudent']:false);

        $builder
        ->add(
          'text', TextType::class,
          array(
            'label' => 'Usuario'
          )
        )
        ->add('rol', EntityType::class, array(
          'class' => Rol::class,
          'query_builder' => function (EntityRepository $er) use ($showStudent) {
              $qb = $er->createQueryBuilder('r');
              if ($showStudent===false) {
                  $qb->where($qb->expr()->neq('r.text',"'ROLE_STUDENT'"));
              }
              return $qb;
            },
          )
        )
        ->add('active', CheckboxType::class, array(
            'required' => false,
            'label' => 'Activo'
          )
        )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User',
            'showStudent' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_questions';
    }


}
