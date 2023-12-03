<?php

namespace App\DataFixtures;
use App\Entity\Season;
use App\Entity\Program;
use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{

    public function getDependencies(): array
    {
        return [
            ProgrammeFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {

        $season = new Season();
        $season->setNumber(1);
        $season->setProgram($this->getReference('program_TheLastOfUs'));
        $season->setYear(2022);
        $season->setDescription("En 2003, Joel (Pedro Pascal) vit avec sa fille Sarah (Nico Parker) et son frère Tommy (Gabriel Luna) à Austin, Texas, qui travaille dans le bâtiment. Sarah paye pour faire réparer la montre de Joel pour son anniversaire. Elle s'endort devant un film et Joel part payer la caution de Tommy pour le sortir de prison. Sarah se réveille quelques heures plus tard et retrouve ses voisins morts, l'un d'eux devenu une créature cannibale. Joel rentre avec Tommy et tue la créature. Alors que Joel, Tommy et Sarah s'enfuient au milieu d'une foule terrorisée, les débris d'un avion s'écrasent sur le camion de Tommy et le renversent. Joel essaie de s'enfuir vers la rivière avec Sarah mais il est bloqué par un soldat armé, qui leur tire dessus. Tommy tue le soldat, mais Sarah est mortellement blessée et meurt dans les bras de son père.");
        $this->addReference('season1_TheLastOfUs', $season);
        $manager->persist($season);

        $season = new Season();
        $season->setNumber(1);
        $season->setProgram($this->getReference('program_Lupin'));
        $season->setYear(2021);
        $season->setDescription("Assane Diop vole une riche famille à Paris pour venger son père, accusé de vol à tort. Pour commettre ses méfaits, il s'inspire des aventures du « gentleman cambrioleur » Arsène Lupin. ");
        $this->addReference('season1_Lupin', $season);
        $manager->persist($season);


        $season = new Season();
        $season->setNumber(2);
        $season->setProgram($this->getReference('program_Lupin'));
        $season->setYear(2023);
        $season->setDescription("Restant à Étretat, Claire contacte la police locale mais est bouleversée par leur inaction et décide d'essayer de retrouver Raoul elle-même. Pendant ce temps, Assane et Youssef localisent Léonard dans une ville voisine et le suivent dans un manoir abandonné, où Léonard, qui a Raoul ligoté et baîllonné, est à l'affût. Youssef contacte discrètement Sofia Belkacem et lui demande de l'aide, mais Assane l'attache à l'intérieur de la voiture. Il entre dans le manoir, combat Léonard et le jette par la fenêtre.");
        $this->addReference('season2_Lupin', $season);
        $manager->persist($season);


        $manager->flush();

    }    
    public function getDependencies(): array
    {
        return [
            ProgramFixtures::class,
        ];
    }
}
