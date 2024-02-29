<?php

namespace App\DataFixtures;

use App\Entity\Tower;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TowerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $towers = [
            ['Burj Khalifa', 'Dubai', 'Émirats Arabes Unis', 828, 163, 2010],
            ['Shanghai Tower', 'Shanghai', 'Chine', 632, 128, 2015],
            ['Abraj Al-Bait Clock Tower', 'La Mecque', 'Arabie Saoudite', 601, 120, 2012],
            ['Ping An Finance Centre', 'Shenzhen', 'Chine', 599, 115, 2017],
            ['Lotte World Tower', 'Séoul', 'Corée du Sud', 555, 123, 2016],
        ];

        foreach ($towers as $towerData) {
            $tower = new Tower();
            $tower->setName($towerData[0]);
            $tower->setCity($towerData[1]);
            $tower->setCountry($towerData[2]);
            $tower->setHeight($towerData[3]);
            $tower->setFloors($towerData[4]);
            $tower->setYearCompleted($towerData[5]);

            $manager->persist($tower);
        }

        $manager->flush();
    }
}
