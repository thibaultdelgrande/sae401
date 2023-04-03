<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {    
        
        $user = new User();
        
        $user->setUsername('admin');
        $user->setPlainPassword('admin');
            

        $manager->persist($user);

        $manager->flush();
    }
}
