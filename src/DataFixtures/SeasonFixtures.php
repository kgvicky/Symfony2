<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

//Tout d'abord nous ajoutons la classe Factory de FakerPhp
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        //Puis ici nous demandons à la Factory de nous fournir un Faker
        $faker = Factory::create();

        /**
        * L'objet $faker que tu récupère est l'outil qui va te permettre 
        * de te générer toutes les données que tu souhaites
        */

        for($i = 0; $i < 50; $i++) {
            $season = new Season();
            //Ce Faker va nous permettre d'alimenter l'instance de Season que l'on souhaite ajouter en base
            $season->setNumber($faker->numberBetween(1, 10));
            $season->setYear($faker->year());
            $season->setDescription($faker->paragraphs(3, true));

            $season->setProgram($this->getReference('program_' . $faker->numberBetween(0, 5)));

            $manager->persist($season);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
           ProgramFixtures::class,
        ];
    }
}

