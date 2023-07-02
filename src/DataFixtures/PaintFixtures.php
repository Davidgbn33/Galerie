<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Paint;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


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
            'paint_image' => 'aquarelle1.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        2 => [
            'paint_name' => 'Bâteau sur l\'eau',
            'description' => 'exercice de transparence des couleurs sur le papier',
            'paint_image' => 'aquarelle2.jpg',
            'inspiration' => 'les modèles d\'estampe japonaise s\'y prête bien.',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 36 x 26',
            'category' => 'Aquarelle',
        ],
        3 => [
            'paint_name' => 'Bambou',
            'description' => 'transparence des couleurs et formes géométriques',
            'paint_image' => 'aquarelle3.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 40 x 30',
            'category' => 'Aquarelle',
        ],
        4 => [
            'paint_name' => 'Chemin noir',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle4.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        5 => [
            'paint_name' => 'Titre',
            'description' => ' ',
            'paint_image' => 'aquarelle5.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        6 => [
            'paint_name' => 'Emerald lake',
            'description' => 'voyage au Canada en Colombie Britannique près des grands parcs, en compagnie de notre fils et de sa famille.
              l\'Emerald Lake se situe dans le parc national de Yoho.',
            'paint_image' => 'aquarelle6.jpg',
            'inspiration' => 'Les deux photos qui m\'ont aidées à peindre cette aquarelle.',
            'image_inspiration' => 'inspiAquarelle6.jpg',
            'taille' => 'Papier 300 gr 36 x 26',
            'category' => 'Aquarelle',
        ],
        7 => [
            'paint_name' => 'Le phare',
            'description' => 'exercice sur le mouvement des vagues. ',
            'paint_image' => 'aquarelle7.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 36 x 26',
            'category' => 'Aquarelle',
        ],
        8 => [
            'paint_name' => 'Chemin noir',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle8.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        9 => [
            'paint_name' => 'titre',
            'description' => 'Exercice sur les transparences, et quoi de mieux qu\'une bouteille
              de vin pour s\'exercer dans la région bordelaise.',
            'paint_image' => 'aquarelle9.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        10 => [
            'paint_name' => 'titre',
            'description' => 'exercice de transparence des couleurs sur le papier',
            'paint_image' => 'aquarelle10.jpg',
            'inspiration' => 'les modèles d\'estampe japonaise s\'y prête bien.',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 36 x 26',
            'category' => 'Aquarelle',
        ],
        11 => [
            'paint_name' => 'Rue de Prades',
            'description' => 'Petit village typique de l\'Allier, Prades se visite par ses ruelles, bordées de maisons en pierre. L\'horizon est limité par la Roche Serviere. ',
            'paint_image' => 'aquarelle11.jpg',
            'inspiration' => ' Aquarelle monochrome et perspective à partir d\'une de mes photos. ',
            'image_inspiration' => 'inspiAquarelle 11.jpg',
            'taille' => 'Papier 300 gr 36 x 26',
            'category' => 'Aquarelle',
        ],
        12 => [
            'paint_name' => 'titre',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle12.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        13 => [
            'paint_name' => 'Chemin noir',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle13.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        14 => [
            'paint_name' => 'Chemin noir',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle14.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        15 => [
            'paint_name' => 'Chemin noir',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle15.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        16 => [
            'paint_name' => 'Chemin noir',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle16.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        17 => [
            'paint_name' => 'Chemin noir',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle17.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        18 => [
            'paint_name' => 'Chemin noir',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle18.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Aquarelle',
        ],
        19 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'pastel1.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Pastel',
        ],
        20 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'pastel2.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Pastel',
        ],
        21 => [
            'paint_name' => 'Féerie ensorcelée',
            'description' => ' Dans le cadre d\'un exercice commun au cours de peinture de
              Sylviane, le sujet doit se réferer au monde des sorcières
              farfadets, fées...',
            'paint_image' => 'pastel3.jpg',
            'inspiration' => 'Par curiosité, et peut être également pas manque d\'inspiration, je
              me suis penché sur les applications d\'IA alors en vogue au moment
              de mes recherches. En prononçant une simple phrase reprenant le
              sujet évoqué, et après plusieurs tentatives infructueuses, le
              temps que, elle et moi, nous nous comprenions, un dessin est
              apparu sur l\'écran. Et c\'est de là que mon inspiration pour ce
              sujet s\'est développée.',
            'image_inspiration' => 'sorciereAI.jpg',
            'taille' => 'Papier 300 gr 50 x 70',
            'category' => 'Pastel',
        ],
        22 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'pastel4.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Pastel',
        ],
        23 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture1.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        24 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture2.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        25 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture3.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        26 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture4.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        27 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture5.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        28 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture6.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        29 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture7.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        30 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture8.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        31 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture9.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        32 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture10.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        33 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture11.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        34 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture12.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        35 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture13.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        36 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture14.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        37 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture15.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        38 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture16.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        39 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture17.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
        40 => [
            'paint_name' => 'titre',
            'description' => 'lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'paint_image' => 'peinture18.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => 'Papier 300 gr 60 x 40',
            'category' => 'Peinture',
        ],
    ];

    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {


        $userAdmin = new User();
        $userAdmin->setfullName('admin')
            ->setEmail('admin@me.fr')
            ->setPassword($this->hasher->hashPassword($userAdmin, '123456'))
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($userAdmin);

        $user = new User();
        $user->setfullName('user')
            ->setEmail('user@me.fr')
            ->setPassword($this->hasher->hashPassword($user, '123456'))
            ->setRoles(['ROLE_USER']);

        $manager->persist($user);


        $categories = [];
        foreach (self::CATEGORY as $value) {
            $category = new Category();
            $category->setCategoryName($value);
            $this->addReference('category_' . $value, $category);
            $manager->persist($category);


            $categories[] = $category;
        }

        $paints = [];
        foreach (self::PAINT as $key => $value) {
            $paint = new Paint();

            $paint->setPaintName($value['paint_name']);
            $paint->setDescription($value['description']);
            $paint->setPaintImage($value['paint_image']);
            $paint->setInspiration($value['inspiration']);
            $paint->setImageInspiration($value['image_inspiration']);
            $paint->setTaille($value['taille']);
            $paint->setCategory($this->getReference('category_' . $value['category']));
            $manager->persist($paint);

            $paints[] = $paint;
        }
        $manager->flush();
    }
}
