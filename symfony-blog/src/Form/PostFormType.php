<?php

namespace App\Form;

use App\Entity\Post;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('title', null , array('label' => "TITULO"))
        ->add('content', null , array('label' => "CONTENIDO"))
        ->add('image', FileType::class, array('label' => "IMAGEN"))
        ->add('Send', SubmitType::class, array('label' => "ENVIAR"));
    ;
}


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
