<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Faq;

class FaqFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $faq = new Faq();
            $faq->setQuestion($faker->sentence);
            $faq->setAnswer($faker->paragraph);
            $manager->persist($faq);
        }
        
        $manager->flush();
    }
}
