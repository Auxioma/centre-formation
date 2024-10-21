<?php

namespace App\DataFixtures;

use App\Entity\Lessons;
use App\DataFixtures\CoursesFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LessonsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 500; ++$i) {
            $lesson = new Lessons();
            $lesson->setTitle($faker->sentence(3));
            $lesson->setContent($faker->text(200));
            $lesson->setCourses($this->getReference('course_'.$i));
            $lesson->setSlug($faker->slug);

            $manager->persist($lesson);

        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CoursesFixtures::class,
        ];
    }
}
