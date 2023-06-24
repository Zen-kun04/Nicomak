<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

abstract class AbstractFixture extends Fixture
{
    public Generator $faker;
    public UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface) {
        $this->faker = Factory::create("fr-FR");
        $this->hasher = $userPasswordHasherInterface;
    }
}
