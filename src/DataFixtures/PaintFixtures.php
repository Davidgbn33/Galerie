<?php

namespace App\DataFixtures;

use App\Entity\Paint;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

const PAINT = [
    1=> [
        'paint_name' => 'Paint',
        'description' => 'Paint',
        'paint_image' => 1.00,
        'inspiration' => 'paint.jpg',
        'image_inspiration' => 'paint.jpg',
        'taille' => 'paint.jpg',
    ],
];


class PaintFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {


      $paint = new Paint();


        $manager->persist($paint);

        $manager->flush();
    }
}
