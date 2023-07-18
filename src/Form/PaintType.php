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
use Symfony\Component\Validator\Constraints\File;
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
                'required'=> false,
                'constraints' => [
        new File([
            'maxSize' => '500k',
            'mimeTypes' => [
                'application/jpg',
                'application/jpeg',
            ],
            'mimeTypesMessage' => 'Veuillez mettre une image de type jpg ou jpeg de moins de 500ko',
        ])
    ]
            ])
            ->add('inspiration', TextareaType::class, [
                'label'=> 'Inspiration',
                'required' => false,
            ])
            ->add('inspirationFile', FileType::class, [
                'label'=> 'Image d\'inspiration',
                'required'=> false,
                'constraints' => [
                    new File([
                        'maxSize' => '500k',
                        'mimeTypes' => [
                            'application/jpg',
                            'application/jpeg',
                        ],
                        'mimeTypesMessage' => 'Veuillez mettre une image de type jpg ou jpeg de moins de 500ko',
                    ])
                ]
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
