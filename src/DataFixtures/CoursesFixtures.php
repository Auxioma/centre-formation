<?php

namespace App\DataFixtures;

use App\Entity\Courses;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CoursesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $course = new Courses();
            $course->setTitle($faker->sentence(3));
            $course->setDescription($faker->text(200));
            $course->setCategory($this->getReference('category_' . rand(1, 33)));
            $course->setUser($this->getReference('user_' . rand(0, 4)));
            $manager->persist($course);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
