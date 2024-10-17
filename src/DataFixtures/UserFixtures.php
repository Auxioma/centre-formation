<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        // Create the first user with ROLE_ADMIN
        $adminUser = new User();
        $adminUser->setEmail('admin@example.com');
        $adminUser->setFirstName($faker->firstName);
        $adminUser->setLastName($faker->lastName);
        $adminUser->setUserName('admin');
        $adminUser->setRoles(['ROLE_ADMIN']);
        $hashedPassword = $this->passwordHasher->hashPassword($adminUser, 'adminpassword');
        $adminUser->setPassword($hashedPassword);
        $adminUser->setVerified(true);
        $manager->persist($adminUser);

        // Create 9 additional users with ROLE_AUTHOR
        for ($i = 0; $i <= 9; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setUserName($faker->userName);
            $user->setRoles(['ROLE_AUTHOR']);
            $hashedPassword = $this->passwordHasher->hashPassword($user, 'userpassword' . $i);
            $user->setPassword($hashedPassword);
            $user->setVerified(true);
            $this->addReference('user_' . $i, $user);
            $manager->persist($user);
        }

        // Save all the users to the database
        $manager->flush();
    }
}
