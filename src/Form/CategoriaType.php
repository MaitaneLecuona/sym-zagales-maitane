<?php

namespace App\Form;

use App\Entity\Categoria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CategoriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion', TexType::class, [
                'label' => 'Tipo de categoria: ',
                'attr' => ['class' => 'form-control  '],
            ])
            ->add('save', SubmitType::class, array('label' => 'Continue',  'attr' => array('class'=>'btn btn-primary')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Categoria::class,
        ]);
    }
}
