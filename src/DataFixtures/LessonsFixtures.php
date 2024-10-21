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
            $lesson->setCourses($this->getReference('course_'. rand(0, 499)));
            $lesson->setSlug($faker->slug);
            $manager->persist($lesson);

            for ($t = 0; $t < rand(3,10); $t++ ) {
                $ParentLesson = new Lessons();
                $ParentLesson->setTitle($faker->sentence(3));
                $ParentLesson->setContent($faker->text(200));
                $ParentLesson->setSlug($faker->slug);
                $ParentLesson->setParent($lesson);
                $manager->persist($ParentLesson);
            }
            
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
