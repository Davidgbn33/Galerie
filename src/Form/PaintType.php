<?php

namespace App\Form;

use App\Entity\Paint;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PaintType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('paintName', TextType::class)
            ->add('description', TextType::class)
            ->add('paintImageFile', VichFileType::class, [
                'label' => 'Image (JPG, PNG, GIF)',
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
            ])
            ->add('inspiration', TextType::class)
            ->add('inspirationFile', VichFileType::class, [
                'label' => 'Image Inspiration (JPG, PNG, GIF)',
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
            ])
            ->add('taille',TextType::class)
            ->add('category', EntityType::class, [
                'class' => 'App\Entity\Category',
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
