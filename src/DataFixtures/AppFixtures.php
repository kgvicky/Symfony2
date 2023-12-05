<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
     //   $this->addReference('category_reference_name', new CategoryFixtures());
       // $this->addReference('program_reference_name', new ProgramFixtures());
    }
}
