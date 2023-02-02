<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;


class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 100; $i++){
            $entity = new Product();
            $rand = rand(1.00, 500.00);
            $entity
                ->setName("Article-$i")
                ->setPrice($rand)
                ;

                $manager->persist($entity);
        }
        $manager->flush();
    }
}
