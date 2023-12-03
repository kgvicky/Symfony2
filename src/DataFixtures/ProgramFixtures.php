<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Program; 
use Faker\Factory;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        foreach (self::PROGRAMMES as $programDescription) {
            $program = new Program();

        $program->setTitle($programDescription['title']);
        $program = new Program();
        $program->setTitle('The Last of Us');
        $program->setSynopsis('20 ans après la destruction de la civilisation moderne par un virus, Joël (Pedro Pascal), un survivant aguerri est embauché pour aider Ellie (Bella Ramsey), une jeune fille de 14 ans, pour rejoindre une autre communauté. Le chemin sera un long road-trip où ils vont croiser de nombreux résistants qui ont leurs propres règles, des paysages désolants et des infectés extrêmement violents. Mais le plus important sera que la relation entre Joël et Ellie changera du tout au tout.');
        $program->setCategory($this->getReference('category_Horreur'));
        $this->addReference('program_TheLastOfUs', $program);
        $manager->persist($program);

        $program->setSynopsis($programDescription['synopsis']);
        $program = new Program();
        $program->setTitle('Lupin');
        $program->setSynopsis("En 1995, le jeune Assane Diop est bouleversé par le suicide de son père, accusé d'un vol qu'il n'a pas commis. Vingt-cinq ans plus tard, Assane (Omar Sy) organise le vol d'un collier ayant appartenu à Marie-Antoinette d'Autriche. Le bijou, aujourd'hui exposé au musée du Louvre, appartenait à la riche famille Pellegrini. Il veut se venger de cette famille ayant accusé à tort son père, en s'inspirant de son personnage fétiche : le « gentleman cambrioleur » Arsène Lupin. En parallèle de ses activités illégales, Assane tente également de s'occuper davantage de son fils Raoul, qui vit aujourd'hui avec son ex-petite amie Claire (Ludivine Sagnier).");
        $program->setCategory($this->getReference('category_Action'));
        $this->addReference('program_Lupin', $program);
        $manager->persist($program);

        $program->setCategory($this->getReference($programDescription['category']));
        $program = new Program();
        $program->setTitle('Dahmer');
        $program->setSynopsis("Sur plus d'une décennie, Jeffrey Dahmer a massacré 17 adolescents et jeunes hommes avant son inculpation. Comment a-t-il pu échapper aux forces de l'ordre pendant si longtemps ?");
        $program->setCategory($this->getReference('category_Horreur'));
        $this->addReference('program_Dahmer', $program);
        $manager->persist($program);

        $this->addReference('program_' . $programDescription['title'], $program);
        $program = new Program();
        $program->setTitle('The Witcher');
        $program->setSynopsis("Le sorceleur Geralt, un chasseur de monstres mutant, se bat pour trouver sa place dans un monde où les humains se révèlent souvent plus vicieux que les bêtes.");
        $program->setCategory($this->getReference('category_Fantastique'));
        $this->addReference('program_TheWitcher', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('The Office');
        $program->setSynopsis("Le quotidien d'un groupe d'employés de bureau dans une fabrique de papier en Pennsylvanie. Michael, le responsable régional, pense être le mec le plus drôle du bureau. Il ne se doute pas que ses employés le tolèrent uniquement parce que c'est lui qui signe les chèques. S'efforçant de paraître cool et apprécié de tous, Michael est en fait perçu comme étant pathétique...");
        $program->setCategory($this->getReference('category_Comédie'));
        $this->addReference('program_TheOffice', $program);
        $manager->persist($program);

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
