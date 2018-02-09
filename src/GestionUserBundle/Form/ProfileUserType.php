<?php
/**
 * Created by PhpStorm.
 * User: khlayil
 * Date: 2/4/18
 * Time: 8:04 PM
 */

namespace GestionUserBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileUserType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse',TextType::class, [
                'attr' =>['class'=>'form-control m-input']])
            ->add('profilePic')
            ->add('city')
            ->add('zipCodes')
            ->add('state')
            ->add('phoneNumber');

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
        return 'FOS\UserBundle\Form\Type\ProfileFormType';

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestion_user_profile';
    }

}