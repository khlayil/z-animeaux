<?php

namespace GestionUserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationUserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse')
        //    ->add('profilePic', FileType::class, array('label' => 'Image(JPG)'))
            ->add('city')
            ->add('zipCodes')
            ->add('state')
            ->add('sexe',ChoiceType::class,array(
                'choices'  => array(
                    'female' => 'female',
                    'male' => 'male',
                    'other' => 'other',
                )))
            ->add('phoneNumber',NumberType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionUserBundle\Entity\User'
        ));
    }
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestion_user_registration';
    }


}
