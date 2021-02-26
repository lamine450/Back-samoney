<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encode;
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encode=$encoder;
    }

    public function load(ObjectManager $manager)
    {
        $profil=["admin_system","admin_agence","agence","caissier"];
        $faker=Factory::create();
        foreach($profil as $key){
            $p=new Profil();
            $p->setLibelle($key);
            $manager->persist($p);
            $user=new User();
            $user->setUsername($faker->username)
                ->setPrenom($faker->firstName())
                ->setNom($faker->lastName)
                ->setPassword($this->encode->encodePassword($user,'pass_1234'))
                ->setTelephone($faker->phoneNumber)
                ->setCni(0000000000000000)
                ->setAdress($faker->streetAddress)
                ->setProfil($p);

            $manager->persist($user);


        }

        $manager->flush();
    }
}
