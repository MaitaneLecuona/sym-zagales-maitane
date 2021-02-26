<?php

namespace App\Form;

use App\Entity\Actividades;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Date;


class ActividadesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' =>  'Nombre actividad: ',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('fecha', Date::class, [
                'label' =>  'Fecha actividad: ',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('imagen',TextType::class, [
                'label' =>  'Imagen actividad: ',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('destino', TextType::class, [
                'label' =>  'Destino actividad: ',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('save', SubmitType::class, array('label' => 'Continue',  'attr' => array('class'=>'btn btn-primary')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actividades::class,
        ]);
    }
}
