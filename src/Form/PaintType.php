<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Paint;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PaintType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('paintName', TextType::class,[
                'label'=> 'Nom de la peinture',
                'required'=> false
            ])
            ->add('description', TextareaType::class,[
                'label'=> 'Description',
                'required'      => false,
            ])
            ->add('paintImageFile', FileType::class,[
                'label'=> 'Image de la peinture',
                'required'=> false
            ])
            ->add('inspiration', TextareaType::class, [
                'label'=> 'Inspiration',
                'required' => false,
            ])
            ->add('inspirationFile', FileType::class, [
                'label'=> 'Image d\'inspiration',
                'required'=> false
            ])
            ->add('taille',TextType::class, [
                'label'=> 'Taille',
                'required'=> false
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'categoryName',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paint::class,
        ]);
    }
}
