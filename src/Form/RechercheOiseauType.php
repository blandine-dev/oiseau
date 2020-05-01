<?php

namespace App\Form;

use App\Entity\RechercheOiseau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class RechercheOiseauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('oiseauNom', TextType::class,[
                "required" =>true,
                "label" => "Rechercher par le nom de l'oiseau"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RechercheOiseau::class,
        ]);
    }
}
