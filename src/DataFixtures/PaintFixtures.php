<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Paint;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


const PAINT = [
    1 => [
        'paint_name' => 'De la vigne au vin',
        'description' => 'Exercice sur les transparences, et quoi de mieux qu\'une bouteille
              de vin pour s\'exercer dans la région bordelaise.',
        'paint_image' => 'https://drive.google.com/drive/folders/1qSfY0eo8GGZYf2lm3KXxxmQU5XWehFnu',
        'inspiration' => '',
        'image_inspiration' => '',
        'taille' => 'Papier 300 gr 60 x 40',
        'category' => 'Aquarelle',
    ],
    2 => [
        'paint_name' => 'Bâteau sur l\'eau',
        'description' => 'exercice de transparence des couleurs sur le papier',
        'paint_image' => 'https://drive.google.com/drive/folders/1qSfY0eo8GGZYf2lm3KXxxmQU5XWehFnu',
        'inspiration' => 'les modèles d\'estampe japonaise s\'y prête bien.',
        'image_inspiration' => '',
        'taille' => 'Papier 300 gr 36 x26',
        'category' => 'Aquarelle',
    ],
];


class PaintFixtures extends Fixture
{
    public const CATEGORY = [
                         'Aquarelle',
                         'Pastel',
                         'Peinture',
    ];
    public const PAINT = [
        1 => [
            'paint_name' => 'De la vigne au vin',
            'description' => 'Exercice sur les transparences, et quoi de mieux qu\'une bouteille
              de vin pour s\'exercer dans la région bordelaise.',
            'paint_image' => 'https://drive.google.com/drive/folders/1qSfY0eo8GGZYf2lm3KXxxmQU5XWehFnu',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        2 => [
            'paint_name' => 'Bâteau sur l\'eau',
            'description' => 'exercice de transparence des couleurs sur le papier',
            'paint_image' => 'https://drive.google.com/drive/folders/1qSfY0eo8GGZYf2lm3KXxxmQU5XWehFnu',
            'inspiration' => 'les modèles d\'estampe japonaise s\'y prête bien.',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 36 x 26',
            'category' => 'Aquarelle',
        ],
    ];

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher =$hasher;
    }

    public function load(ObjectManager $manager): void
    {

        $categories =[];
        foreach (self::CATEGORY as $value) {
            $category = new Category();
            $category->setCategoryName($value);
            $manager->persist($category);

            $categories[] = $category;

        }
        $userAdmin = new User();
        $userAdmin->setfullName('admin')
            ->setEmail('admin@me.fr')
            ->setPassword($this->hasher->hashPassword($userAdmin,'123456'))
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($userAdmin);

        $user = new User();
        $user->setfullName('user')
            ->setEmail('user@me.fr')
            ->setPassword($this->hasher->hashPassword($user,'123456'))
            ->setRoles(['ROLE_USER']);

        $manager->persist($user);

        $paints = [];
        foreach (self::PAINT as $key => $value) {
            $paint = new Paint();
            $paint->setPaintName($value['paint_name']);
            $paint->setDescription($value['description']);
            $paint->setPaintImage($value['paint_image']);
            $paint->setInspiration($value['inspiration']);
            $paint->setImageInspiration($value['image_inspiration']);
            $paint->setTaille($value['taille']);
            $paint->setCategory($category);
            $manager->persist($paint);

            $paints[] = $paint;
        }

        $manager->flush();
    }
}
