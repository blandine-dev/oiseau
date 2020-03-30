<?php

namespace App\Form;

use App\Entity\Oiseau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class OiseauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('imageFile', FileType::class, ['required' => false])
            ->add('description')
            ->add('lieu')
            ->add('vie')
            ->add('alimentation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oiseau::class,
        ]);
    }
}
