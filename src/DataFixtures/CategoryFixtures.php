<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 2; ++$i) {
            $n1 = new Category();
            $n1->setName('Level - '.$i)
                ->setSlug('Level-'.$i)
                ->setOnline(true)
                ->setMetaTitle('Meta title '.$i)
                ->setMetaDescription('Meta description '.$i)
                ->setImage('category-'.$i.'.jpg')
                ->setPopular(true);
            $manager->persist($n1);

            for ($j = 0; $j < 4; ++$j) {
                $n2 = new Category();
                $n2->setName('Level - '.$i.' - '.$j)
                    ->setSlug('Level-'.$i.'-'.$j)
                    ->setOnline(true)
                    ->setMetaTitle('Meta title '.$j)
                    ->setMetaDescription('Meta description '.$j)
                    ->setImage('category-'.$j.'.jpg')
                    ->setPopular(true)
                    ->setParent($n1);
                $manager->persist($n2);

                for ($k = 0; $k < 4; ++$k) {
                    $n3 = new Category();
                    $n3->setName('Level - '.$i.' - '.$j.' - '.$k)
                        ->setSlug('Level-'.$i.'-'.$j.'-'.$k)
                        ->setOnline(true)
                        ->setMetaTitle('Meta title '.$k)
                        ->setMetaDescription('Meta description '.$k)
                        ->setImage('category-'.$k.'.jpg')
                        ->setPopular(true)
                        ->setParent($n2);
                    $manager->persist($n3);
                    $this->setReference('category_'.$k, $n3);
                }
            }
        }

        $manager->flush();
    }
}
