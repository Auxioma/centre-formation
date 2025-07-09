<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    private const ROOT_COUNT = 6;
    private const CHILD_COUNT = 3;
    private const SUBCHILD_COUNT = 3;
    private const IMAGE_NAME = 'herobanner__1.png';

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < self::ROOT_COUNT; $i++) {
            $rootCategory = $this->createCategory($faker);
            $manager->persist($rootCategory);

            for ($j = 0; $j < self::CHILD_COUNT; $j++) {
                $childCategory = $this->createCategory($faker, $rootCategory);
                $manager->persist($childCategory);

                for ($k = 0; $k < self::SUBCHILD_COUNT; $k++) {
                    $subCategory = $this->createCategory($faker, $childCategory);
                    $manager->persist($subCategory);
                }
            }
        }

        $manager->flush();
    }

    private function createCategory($faker, ?Category $parent = null): Category
    {
        $category = new Category();
        $category->setName($faker->word());
        $category->setSlug($faker->slug);
        $category->setImageName(self::IMAGE_NAME);
        $category->setImageSize($faker->numberBetween(100, 500));

        if ($parent !== null) {
            $category->setParent($parent);
        }

        return $category;
    }
}
