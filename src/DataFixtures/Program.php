<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Program; 

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $program1 = new Program();
        $program1->setName('Programme A');

        $program2 = new Program();
        $program2->setName('Programme B');

        $manager->persist($program1);
        $manager->persist($program2);

        $category = $this->getReference('nom Categorie');

        $program1->setCategory($category);
        $program2->setCategory($category);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
