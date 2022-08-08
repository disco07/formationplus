<?php

namespace App\DataFixtures;

use App\Entity\Convention;
use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $convention = new Convention();
        $convention->setNom("Mathématique");
        $convention->setNbHeur(10);
        $manager->persist($convention);
        for ($i = 0; $i < 20; $i++) {
            $etudiant = new Etudiant();
            $etudiant->setNom('Inoussa'.$i);
            $etudiant->setPrenom("chaabane".$i);
            $etudiant->setMail("chaabane'$i'@gmail.com");
            $etudiant->setConvention($convention);
            $manager->persist($etudiant);
        }

        $manager->flush();
    }
}
