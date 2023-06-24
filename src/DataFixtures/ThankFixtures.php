<?php

namespace App\DataFixtures;

use App\Entity\Thanks;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ThankFixtures extends AbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i < 10; $i++) { 
            
            $thanks = new Thanks();
            $thanks->setFromUser($this->getReference("employee_" . $i))
            ->setToUser($this->getReference("employee_" . $this->faker->numberBetween(1, 9)))
            ->setReason($this->faker->sentence())
            ->setThankedAt(new \DateTimeImmutable());
            $manager->persist($thanks);
        }
        
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies() {
        return [
            EmployeeFixtures::class
        ];
    }
}
