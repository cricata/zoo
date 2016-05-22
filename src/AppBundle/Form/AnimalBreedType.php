<?php
namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AnimalBreedType extends AbstractType
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
            ->add('description', TextType::class, array(
                'translation_domain'=>'AppBundle'
            ))
            ->add('details', TextType::class, array(
                'translation_domain'=>'AppBundle'
            ))    
            ->add('animalHabitats', EntityType::class, array(
                'class' => 'AppBundle:AnimalHabitat',
                'placeholder' => 'Choose an Animal Habitat',
                'translation_domain'=>'AppBundle',
                'choice_translation_domain'=>'AppBundle',
            ))
            ->add('dailyRequirements', TextType::class, array(
                'translation_domain'=>'AppBundle'
            ))
            ->add('unitMeasure', EntityType::class, array(
                'class' => 'AppBundle:UnitMeasure',
                'placeholder' => 'Choose an Unit Measure',
                'translation_domain'=>'AppBundle',
                'choice_translation_domain'=>'AppBundle',
            )) 
            ->add('foodItems', EntityType::class, array(
                'class' => 'AppBundle:FoodItem',
                'placeholder' => 'Choose a Food item',
                'translation_domain'=>'AppBundle',
                'choice_translation_domain'=>'AppBundle',
            ))
            ->add('animalCategories', EntityType::class, array(
                'class' => 'AppBundle:AnimalCategory',
                'placeholder' => 'Choose a Animal Category',
                'translation_domain'=>'AppBundle',
                'choice_translation_domain'=>'AppBundle',
            ))   
             ->add('photos', EntityType::class, array(
                'class' => 'AppBundle:AnimalPhoto',
                'placeholder' => 'Choose an animal photo',
                'translation_domain'=>'AppBundle',
                'choice_translation_domain'=>'AppBundle',
            ))
            ;
            
        
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AnimalBreed',
        ));
    }
}
