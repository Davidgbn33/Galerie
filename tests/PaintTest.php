<?php

namespace App\Tests;

use App\Entity\Paint;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PaintTest extends KernelTestCase
{
    public function testSomething(): void
    {
         self::bootKernel();
         $container = static::getContainer();

         $paint = new Paint();
         $paint->setPaintName('paint')
             ->setDescription('c\'est un test')
             ->setTaille('30 x 40');

         $errors = $container->get('validator')->validate($paint);


         $this->assertCount(0, $errors );

    }
}
