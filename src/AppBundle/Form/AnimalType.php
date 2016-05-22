<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AnimalType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'translation_domain'=>'AppBundle'
            ))
            ->add('dateOfBirth', TextType::class, array(
                'translation_domain'=>'AppBundle'
            ))
            ->add('details', TextType::class, array(
                'translation_domain'=>'AppBundle'
            )) 
            ->add('dailyFoodAmount', TextType::class, array(
                'translation_domain'=>'AppBundle'
            ))
            ->add('unitMeasure', EntityType::class, array(
                'class' => 'AppBundle:UnitMeasure',
                'placeholder' => 'Choose an Unit Measure',
                'translation_domain'=>'AppBundle',
                'choice_translation_domain'=>'AppBundle',
            ))
            ->add('breedCodes', EntityType::class, array(
                'class' => 'AppBundle:AnimalBreed',
                'placeholder' => 'Choose an Animal Breed',
                'translation_domain'=>'AppBundle',
                'choice_translation_domain'=>'AppBundle',
            ))
            ->add('foodItems', EntityType::class, array(
                'class' => 'AppBundle:FoodItem',
                'placeholder' => 'Choose a Food Item',
                'translation_domain'=>'AppBundle',
                'choice_translation_domain'=>'AppBundle',
            ))
            ->add('cages', EntityType::class, array(
                'class' => 'AppBundle:Cage',
                'placeholder' => 'Choose a Cage',
                'translation_domain'=>'AppBundle',
                'choice_translation_domain'=>'AppBundle',
            ));
              
                

           
        
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Animal',
        ));
    }
}
