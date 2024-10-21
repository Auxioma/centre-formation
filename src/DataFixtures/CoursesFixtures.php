<?php

namespace App\DataFixtures;

use App\Entity\Courses;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CoursesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 500; ++$i) {
            $course = new Courses();
            $course->setTitle($faker->sentence(3));
            $course->setDescription($faker->text(200));
            $course->setCategory($this->getReference('category_'.rand(0, 3)));
            $course->setUser($this->getReference('user_'.rand(0, 4)));
            $course->setSlug($faker->slug);
            $course->setPicture('grid_1.png');
            $this->addReference('course_'.$i, $course);
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
