<?php

namespace App\Form;

use App\Entity\Comment;
use App\Entity\Paint;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('comment', TextareaType::class, [
                'label'=>'Votre Message',

            ])
            ->add('paint', HiddenType::class, [
            ])
            ->add('send', SubmitType::class, [
                'label'=>'Envoyer',
                'attr'=>[
                    'class'=>'te-btn'
                ]
            ])
        ;

        $builder->get('paint')
            ->addModelTransformer(new CallbackTransformer(
                fn (Paint $paint) => $paint->getId(),
                fn (Paint $paint) => $paint->getPaintName()
            ));
    }
public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'data_class'=> Comment::class,
        'csrf_token_id'=>'comment_add',

    ]);
}
}
