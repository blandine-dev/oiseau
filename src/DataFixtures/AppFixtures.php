<?php

namespace App\DataFixtures;

use App\Entity\Oiseau;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $o1 = New Oiseau();
        $o1->setNom('Rouge-gorge')
        ->setDescription('Un petit oiseau à la gorge rouge')
        ->setImage('oiseaux/rouge-gorge.jpg')
        ->setLieu('jardins et zones construites')
        ->setVie('sédentaire')
        ->setAlimentation('granivore')
        ;
    $manager->persist($o1);

    $o2 = New Oiseau();
    $o2->setNom('Merle')
        ->setDescription('Un oiseau noir au bec jaune')
        ->setImage('oiseaux/merle.jpg')
        ->setLieu('jardins et zones construites')
        ->setVie('sédentaire')
        ->setAlimentation('omnivore')
        ;
    $manager->persist($o2);

    $o3 = New Oiseau();
    $o3->setNom('Aigrette')
        ->setDescription('Un oiseau blanc à longues pattes')
        ->setImage('oiseaux/aigrette.jpg')
        ->setLieu('lacs et rivières')
        ->setVie('migrateur')
        ->setAlimentation('piscivore')
        ;
    $manager->persist($o3);

    $o4 = New Oiseau();
    $o4->setNom('Chardonneret')
        ->setDescription('Un petit oiseau à tête rouge')
        ->setImage('oiseaux/chardonneret.jpg')
        ->setLieu('jardins et zones construites')
        ->setVie('sédentaire')
        ->setAlimentation('granivore')
        ;
    $manager->persist($o4);

    $o5 = New Oiseau();
    $o5->setNom('Milan-royal')
        ->setDescription('Un rapace')
        ->setImage('oiseaux/milan-royal.jpg')
        ->setLieu('forêts et campagnes')
        ->setVie('migrateur')
        ->setAlimentation('carnivore')
        ;
    $manager->persist($o5);

    $o6 = New Oiseau();
    $o6->setNom('Cormoran')
        ->setDescription('Un grand oiseau noir')
        ->setImage('oiseaux/cormoran.jpg')
        ->setLieu('mers et océans')
        ->setVie('sédentaire')
        ->setAlimentation('piscivore')
        ;
    $manager->persist($o6);


        $manager->flush();
    }
}
