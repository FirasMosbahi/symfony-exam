<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\Pfe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PfeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker=Factory::create();
        for ($i=0;$i<10;$i++){
            $entreprise= new Entreprise();
            $name=$faker->domainName;
            $entreprise->setName($name);
            $pfe = new PFE();
            $pfe->setStudent($faker->name);
            $pfe->setTitle($faker->name);
            $pfe->setEntreprise($entreprise);
            $manager->persist($entreprise);
            $manager->persist($pfe);

        }

        $manager->flush();

    }
}
