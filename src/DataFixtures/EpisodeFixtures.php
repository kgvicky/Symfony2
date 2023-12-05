<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Season;
use App\Entity\Program;
use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $episode = new Episode();
        $episode->setTitle("When You're Lost in the Darkness");
        $episode->setNumber(1);
        $episode->setSeason($this->getReference('season_The Last of Us'));
        $episode->setSynopsis("Dans un talk show de 1968, deux épidémiologistes, le Dr Neuman (John Hannah) et le Dr Schoenheiss (Christopher Heyerdahl), discutent des conséquences d'une potentielle pandémie mondiale. Neuman avance que les champignons, tels que le Cordyceps, sont une menace tout aussi grande que n'importe quelle bactérie ou que n'importe quel virus étant donné l'absence de traitement ou d'antidote pour un infection fongique. Schoenheiss pointe l'impossibilité pour des humains d'être atteints d'une infection fongique en raison de l'incapacité des champignons à survivre à la température élevée de leur corps. Neuman est d'accord mais il fait remarquer que les champignons pourraient évoluer pour dépasser cette faiblesse à mesure que le monde se réchauffe, moment à partir duquel l'humanité ne survivrait pas.");
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setTitle('Infected');
        $episode->setNumber(2);
        $episode->setSeason($this->getReference("season_The Last of Us"));
        $episode->setSynopsis("Vingt ans plus tard, en 2023, après que la pandémie mondiale du champignon Cordyceps a décimé la civilisation humaine, Joel vit dans une zone de quarantaine militaire située dans les ruines de Boston, Massachusetts, gérée par l'Agende Fédérale de Réponse au Désastre (Federal Disaster Response Agency, FEDRA). Lui et sa partenaire Tess (Anna Torv) se soutiennent mutuellement en faisant de la contrebande avec des civils et des soldats. Joel a l'intention de quitter la zone pour le Wyoming à la recherche de Tommy, avec qui il a perdu contact plusieurs semaines auparavant.");
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setTitle("Chapitre 1: Le Collier de la reine");
        $episode->setNumber(1);
        $episode->setSeason($this->getReference('season1_Lupin'));
        $episode->setSynopsis("LAssane Diop planifie le vol d'un collier de diamants de grande valeur, ayant appartenu à Marie-Antoinette, que son père, Babakar, avait été accusé d'avoir volé à la riche famille Pellegrini, 25 ans plus tôt. Il fait appel à un groupe d'usuriers, à qui il doit de l'argent. Sous le pseudonyme de Paul Sernine, Assane assiste à la vente aux enchères du collier, organisée par les Pellegrini au Louvre..");
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setTitle("Chapitre 2: L'Illusion");
        $episode->setNumber(2);
        $episode->setSeason($this->getReference('season1_Lupin'));
        $episode->setSynopsis("Après que le meilleur ami d'Assane, l'antiquaire Benjamin Ferel, l'ait informé qu'il était peu probable que les bijoux du collier aient été dispersés à travers le monde, comme l'avait affirmé la famille Pelligrini, Assane commence à douter que son père soit responsable du vol. Il confronte Juliette Pelligrini, qui admet que l'histoire de sa famille était un mensonge mais affirme sa croyance en la culpabilité de Babakar..");
        $manager->persist($episode);

        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class,
        ];
    }

}