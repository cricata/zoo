<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class FoodItemType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('code', TextType::class, array(
                    'translation_domain' => 'AppBundle',
                ))
                ->add('name', TextType::class, array(
                    'translation_domain' => 'AppBundle',
                ))
                ->add('description', TextType::class, array(
                    'translation_domain' => 'AppBundle',
                ))
                ->add('foodCategories', EntityType::class, array(
                    'class' => 'AppBundle\Entity\FoodCategory',
                    'placeholder' => 'Choose a food Category',
                    'translation_domain' => 'AppBundle'
        ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FoodItem'
        ));
    }

}
