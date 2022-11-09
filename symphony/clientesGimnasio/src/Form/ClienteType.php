<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Tarifas;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ClienteType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
        ->  add ('nombre', TextType::class)
        ->  add ('apellidos', TextType::class)
        ->  add ('email', EmailType::class, array('label' => 'Correo electrónico'))
        ->  add ('telefono', TextType::class)
        ->  add ('f_nacimiento', DateType::class, array('years'=> range(date('Y')-100 , date('Y')), 'label' => 'Fecha de nacimiento'))
        ->  add ('dni', TextType::class)
        ->  add ('n_cuenta', TextType::class, array('label' => 'IBAN'))
        ->  add ('tarifas', EntityType::class, array(
            'class' => Tarifas::class,
            'choice_label' => 'tarifa',))
        ->  add('save', SubmitType::class, array('label' => 'ENVIAR'));
    }
}

