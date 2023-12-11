<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Program; 
use Faker\Factory;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    private const PROGRAMMES = [
        ['title' => "The Last of Us", 'synopsis' => "20 ans après la destruction de la civilisation moderne par un virus, Joël (Pedro Pascal), un survivant aguerri est embauché pour aider Ellie (Bella Ramsey), une jeune fille de 14 ans, pour rejoindre une autre communauté. Le chemin sera un long road-trip où ils vont croiser de nombreux résistants qui ont leurs propres règles, des paysages désolants et des infectés extrêmement violents. Mais le plus important sera que la relation entre Joël et Ellie changera du tout au tout.", 'category' => "Horreur"],
        ['title' => "Lupin", 'synopsis'=> "En 1995, le jeune Assane Diop est bouleversé par le suicide de son père, accusé d'un vol qu'il n'a pas commis. Vingt-cinq ans plus tard, Assane (Omar Sy) organise le vol d'un collier ayant appartenu à Marie-Antoinette d'Autriche. Le bijou, aujourd'hui exposé au musée du Louvre, appartenait à la riche famille Pellegrini. Il veut se venger de cette famille ayant accusé à tort son père, en s'inspirant de son personnage fétiche : le « gentleman cambrioleur » Arsène Lupin. En parallèle de ses activités illégales, Assane tente également de s'occuper davantage de son fils Raoul, qui vit aujourd'hui avec son ex-petite amie Claire (Ludivine Sagnier).", 'category' => "Action"],
        ['title' => "Dahmer", 'synopsis'=> "Sur plus d'une décennie, Jeffrey Dahmer a massacré 17 adolescents et jeunes hommes avant son inculpation. Comment a-t-il pu échapper aux forces de l'ordre pendant si longtemps ?", 'category' => "Horreur"],
        ['title' => "The Office", 'synopsis'=> "Le quotidien d'un groupe d'employés de bureau dans une fabrique de papier en Pennsylvanie. Michael, le responsable régional, pense être le mec le plus drôle du bureau. Il ne se doute pas que ses employés le tolèrent uniquement parce que c'est lui qui signe les chèques. S'efforçant de paraître cool et apprécié de tous, Michael est en fait perçu comme étant pathétique...", 'category' => "Comédie"],
        ['title' => "Wednesday", 'synopsis'=> "Mercredi Addams est envoyée par ses parents, Gomez et Morticia, au sein de la Nevermore Academy, à Jericho dans le Vermont, après avoir été une nouvelle fois expulsée d'un lycée. Nevermore est un établissement pour enfants particuliers, dirigé d'une main de fer par Larissa Weems, l'ancienne colocataire de Morticia lorsque toutes deux y étaient étudiantes.", 'category' => 'Fantastique']

        ];

        public function getDependencies(): array
        {
            return [
                CategoryFixtures::class,
            ];
        }
    
        public function load(ObjectManager $manager): void
        {
            foreach (self::PROGRAMMES as $programDescription) {
                $program = new Program();
                $program->setTitle($programDescription['title']);
                $program->setSynopsis($programDescription['synopsis']);
                $program->setYear($programDescription['year']);
                $program->setCountry($programDescription['country']);
                $program->setCategory($this->getReference($programDescription['category']));
                $manager->persist($program);
                $this->addReference('program_' . $programDescription['title'], $program);
            }
            $manager->flush();
        }

        static function getTitles(): array
{
    $titles = [];

    foreach (self::PROGRAMMES as $array) {
        $titles[] = $array['title'];
    }

    return $titles;
}

}
    
    //     static function getTitles(): array
    //     {
    //         return array_map(fn ($array) => $array['title'], self::PROGRAMMES);
    //     }
    // }
