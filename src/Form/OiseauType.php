<?php

namespace App\Form;

use App\Entity\Oiseau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class OiseauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('imageFile', FileType::class, ['required' => false])
            ->add('description')
            ->add('descriptionDeux')
            ->add('descriptionTrois')
            ->add('lieu', ChoiceType::class, [
                'placeholder' => 'Choisissez une catégorie',
                'choices'  => [
                    'lacs et rivières' => 'lacs et rivières',
                    'jardins et zones construites' => 'jardins et zones construites',
                    'campagnes' => 'campagnes',
                    'mers et océans' => 'mers et océans',
                ],
            ])
            ->add('vie', ChoiceType::class, [
                'placeholder' => 'Choisissez une catégorie',
                'choices'  => [
                    'migrateur' => 'migrateur',
                    'sédentaire' => 'sédentaire',
                ],
            ])
            ->add('alimentation', ChoiceType::class, [
                'placeholder' => 'Choisissez une catégorie',
                'choices'  => [
                    "graines, fruits" => "graines, fruits",
                    "insectes, petits invertébrés" => "insectes, petits invertébrés",
                    "poissons, batraciens, reptils, crustacés" => "poissons, batraciens, reptils, crustacés",
                    "petits mamifères, oiseaux, charognes" => "petits mamifères, oiseaux, charognes",
                    "très variée (omnivore)" => "très variée (omnivore)",
                ],
            ])
            ->add('motcl')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oiseau::class,
        ]);
    }
}
