<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class EmployeeFixtures extends AbstractFixture
{
    public function load(ObjectManager $manager): void
    {
        $employee = new User();
        $employee->setEmail("admin@nicomak.eu")
        ->setPassword($this->hasher->hashPassword($employee, "123456"))
        ->setRoles(["ROLE_ADMIN"]);

        $manager->persist($employee);

        for ($i=1; $i < 10; $i++) { 
            $employee = new User();
            $employee->setEmail(strtolower(substr($this->faker->firstName(), 0, 1)) . '.' . strtolower($this->faker->lastName()) . "@nicomak.eu")
            ->setPassword($this->hasher->hashPassword($employee, "123456"));
            $this->setReference("employee_" . $i, $employee);
            $manager->persist($employee);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
