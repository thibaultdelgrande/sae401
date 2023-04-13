<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\EscapeGame;
use Faker\Factory;

class EscapeGameFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 10; $i++) { 
            $escapeGame = new EscapeGame();
            $escapeGame->setTitre($faker->sentence(3, true))
                        ->setDescription($faker->paragraph(3, true))
                        ->setDuree(DateTimeImmutable::createFromFormat('H:i', $faker->time('H:i', '3:00')))
                        ->setNombreJoueursMax(rand(2, 12))
                        ->setImage('https://picsum.photos/300/200')
                        ->setPrix(rand(10, 100));
            $manager->persist($escapeGame);

        }

        $manager->flush();
    }
}
