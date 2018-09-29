<?php

namespace Examen\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use  Examen\BlogBundle\Entity\Category;

class ArticlesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre', TextType::class)
        ->add('auteur', TextType::class)
        ->add('description', TextareaType::class)
        ->add('categorie', EntityType::class, array(
            'class'=>'ExamenBlogBundle:Category',
            'choice_label'=>'categori',
            'expanded'=>false,
            'multiple'=>false
        ))
        
        ->add('image', FileType::class, array(
            'label'=>'image'
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Examen\BlogBundle\Entity\Articles'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'examen_blogbundle_articles';
    }


}
