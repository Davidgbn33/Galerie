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
       1=>[ 'category_name'=>'Aquarelle',
            'category_image'=> 'aquarelle.jpg'],
        2=>[ 'category_name'=>'Pastel',
            'category_image'=>'pastel.jpg'],
        3=>[ 'category_name'=>'Peinture',
            'category_image'=>'pinceau.jpg'],

    ];
    public const PAINT = [
        1 => [
            'paint_name' => 'Bordeaux',
            'description' => 'Exercice sur les transparences, et quoi de mieux qu\'une bouteille
              de vin pour s\'exercer dans la région bordelaise.',
            'paint_image' => 'aquarelle1.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '40 x 30',
            'category' => 'Aquarelle',
        ],
        2 => [
            'paint_name' => 'Jonques',
            'description' => 'exercice de transparence des couleurs sur le papier',
            'paint_image' => 'aquarelle2.jpg',
            'inspiration' => 'les modèles d\'estampe japonaise s\'y prêtent bien.',
            'image_inspiration' => '',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        3 => [
            'paint_name' => 'Bambou',
            'description' => 'transparence des couleurs et formes géométriques',
            'paint_image' => 'aquarelle3.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '40 x 30',
            'category' => 'Aquarelle',
        ],
        4 => [
            'paint_name' => 'Chemin noir',
            'description' => 'Chemin de randonnée, à la fin de l\'hiver, lorsque la neige fondue
              laisse apparaitre la couleur de la terre.',
            'paint_image' => 'aquarelle4.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '60 x 40',
            'category' => 'Aquarelle',
        ],
        6 => [
            'paint_name' => 'Emerald lake',
            'description' => 'voyage au Canada en Colombie Britannique près des grands parcs, en compagnie de notre fils et de sa famille.
              l\'Emerald Lake se situe dans le parc national de Yoho.',
            'paint_image' => 'aquarelle6.jpg',
            'inspiration' => 'Une photo qui m\'a aidée à peindre cette aquarelle.',
            'image_inspiration' => 'inspiAquarelle6.jpg',
            'taille' => '56 x 38',
            'category' => 'Aquarelle',
        ],
        7 => [
            'paint_name' => 'Le phare',
            'description' => 'exercice sur le mouvement des vagues. ',
            'paint_image' => 'aquarelle7.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        8 => [
            'paint_name' => 'brume',
            'description' => 'Pastel sur papier Hahnemülhe "Ingres"',
            'paint_image' => 'brume.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '40 x 30',
            'category' => 'Pastel',
        ],
        9 => [
            'paint_name' => 'Reflet',
            'description' => 'Exercice sur le reflet dans l\'eau',
            'paint_image' => 'aquarelle9.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        10 => [
            'paint_name' => 'Licorne',
            'description' => 'lors d\'une rando en Corse (GR20), au détour d\'un chemin, cet arbre m\'est apparu tel quel',
            'paint_image' => 'aquarelle10.jpg',
            'inspiration' => 'L\'arbre est mis en relief sur un fond de montagne fantasmagorique. ',
            'image_inspiration' => 'inspiAquarelle10.jpg',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        11 => [
            'paint_name' => 'Rue de Prades',
            'description' => 'Petit village typique de l\'Allier, Prades se visite par ses ruelles, bordées de maisons en pierre. L\'horizon est limité par la Roche Serviere. ',
            'paint_image' => 'aquarelle11.jpg',
            'inspiration' => ' Aquarelle monochrome et perspective à partir d\'une de mes photos. ',
            'image_inspiration' => 'inspiAquarelle11.jpg',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        12 => [
            'paint_name' => 'Bateaux échoués',
            'description' => 'Etudes sur les couleurs ',
            'paint_image' => 'aquarelle12.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '36 x 13',
            'category' => 'Aquarelle',
        ],
        13 => [
            'paint_name' => 'Collines brumeuses',
            'description' => 'Etudes de la profondeur de champ par les couleurs, et le rendu de la brume',
            'paint_image' => 'aquarelle13.jpg',
            'inspiration' => 'le Pays basque',
            'image_inspiration' => '',
            'taille' => '20 x 15',
            'category' => 'Aquarelle',
        ],
        14 => [
            'paint_name' => 'Vestige et ruisseau',
            'description' => 'Travail d\'étude sur la forêt',
            'paint_image' => 'aquarelle14.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        15 => [
            'paint_name' => 'Le loup',
            'description' => 'Etude d\'un animal. Revenant du canada, le loup me paru être un sujet interressant. ',
            'paint_image' => 'aquarelle15.jpg',
            'inspiration' => 'Photo vue dans une cabane au canada.',
            'image_inspiration' => '',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        16 => [
            'paint_name' => 'Arbres psychedeliques',
            'description' => 'essai de coulures sur papier aquarelle avec un ajout d\'huile de silicone (Utilisée dans le Pouring)',
            'paint_image' => 'aquarelle16.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        17 => [
            'paint_name' => 'Le grand canal à Venise',
            'description' => 'Voyage à Venise',
            'paint_image' => 'aquarelle17.jpg',
            'inspiration' => 'Photo prise sur le grand canal à Venise.',
            'image_inspiration' => 'inspiAquarelle17.jpg',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        18 => [
            'paint_name' => 'La clef',
            'description' => 'Etude d\'un détail de porte ancienne',
            'paint_image' => 'aquarelle18.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '36 x 26',
            'category' => 'Aquarelle',
        ],
        19 => [
            'paint_name' => 'Voiliers',
            'description' => 'Pastel sur papier "one touch" ',
            'paint_image' => 'pastel1.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '60 x 40',
            'category' => 'Pastel',
        ],
        20 => [
            'paint_name' => 'Coq',
            'description' => '',
            'paint_image' => 'pastel2.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '45 x 45',
            'category' => 'Pastel',
        ],
        21 => [
            'paint_name' => 'La Laitière',
            'description' => 'Etude d\'un tableau de Maitre, en l\'occurence VERMEER sur papier PASTELMAT.',
            'paint_image' => 'pastel3.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '41 x 37',
            'category' => 'Pastel',
        ],
        22 => [
            'paint_name' => 'Chauve souris',
            'description' => 'Dans le cadre d\'un exercice commun au cours de peinture de Sylviane, le sujet doit se réferer à une planche animalière.',
            'paint_image' => 'pastel4.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '50 x 70',
            'category' => 'Pastel',
        ],
        24 => [
            'paint_name' => 'Dunkerque le Port',
            'description' => 'Peinture acrylique sur toile. ',
            'paint_image' => 'peinture2.jpg',
            'inspiration' => 'Ma ville natale a toujours été une source d\'inspiration. ',
            'image_inspiration' => '',
            'taille' => '50 x 15',
            'category' => 'Peinture',
        ],
        25 => [
            'paint_name' => 'Coquillages',
            'description' => 'peinture acrylique sur toile ',
            'paint_image' => 'peinture3.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '70 x 50',
            'category' => 'Peinture',
        ],
        26 => [
            'paint_name' => 'Yoda',
            'description' => 'Peinture à l\'huile sur toile',
            'paint_image' => 'peinture4.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '55 x 46',
            'category' => 'Peinture',
        ],
        27 => [
            'paint_name' => 'Vancouver',
            'description' => 'Peinture acrylique sur panneau isorel. La mer est réalisée avec du papier de soie froissé et collé. Le soleil est représenté par une feuille d\'or. ',
            'paint_image' => 'peinture5.jpg',
            'inspiration' => 'Un voyage en Colombie Britannique m\'a fait découvrir la ville. de nombreuses photos m\'ont inspiré pour réaliser ce tableau ',
            'image_inspiration' => 'inspiVancouver.jpg',
            'taille' => '100 x 34',
            'category' => 'Peinture',
        ],
        28 => [
            'paint_name' => 'Lescun',
            'description' => 'Peinture acrylique sur toile. les ombres des montagnes sont réalisées avec du sable coloré. ',
            'paint_image' => 'peinture6.jpg',
            'inspiration' => 'Ce village est le départ de nombreuses randonnées. ',
            'image_inspiration' => 'lescun.jpg',
            'taille' => '100 x 70',
            'category' => 'Peinture',
        ],
        29 => [
            'paint_name' => 'Belle île en mer',
            'description' => 'Peinture acrylique sur toile. ',
            'paint_image' => 'peinture7.jpg',
            'inspiration' => 'les rochers de Fort Coton ont inspiré de nombreux peintres. ',
            'image_inspiration' => '',
            'taille' => '72 x 55',
            'category' => 'Peinture',
        ],
30=> [
            'paint_name' => 'Incendie',
            'description' => 'Peinture acrylique sur toile ',
            'paint_image' => 'peinture19.jpg',
            'inspiration' => 'les incendies de 2022 dans les Landes. L\'arbre de vie donne un espoir. ',
            'image_inspiration' => '',
            'taille' => '70 x 50',
            'category' => 'Peinture',
        ],

        31 => [
            'paint_name' => 'Table garnie',
            'description' => 'Peinture acrylique sur toile. ',
            'paint_image' => 'peinture8.jpg',
            'inspiration' => 'Cette table garnie se trouvait à la maison forte de Reignac en dordogne. ',
            'image_inspiration' => '',
            'taille' => '72 x 55',
            'category' => 'Peinture',
        ],
        32 => [
            'paint_name' => 'Gratte Ciel',
            'description' => 'Peinture acrylique sur toile ',
            'paint_image' => 'peinture9.jpg',
            'inspiration' => 'Representation des villes en expansion ',
            'image_inspiration' => '',
            'taille' => '40 x 40',
            'category' => 'Peinture',
        ],
        33 => [
            'paint_name' => 'Neige',
            'description' => 'Peinture acrylique sur toile ',
            'paint_image' => 'peinture10.jpg',
            'inspiration' => 'paysage saisi en hiver aux portes de Laguiolle ',
            'image_inspiration' => '',
            'taille' => '56 x 46',
            'category' => 'Peinture',
        ],
        34 => [
            'paint_name' => 'Plage de Malo les Bains',
            'description' => 'Peinture acrylique sur toile ',
            'paint_image' => 'peinture11.jpg',
            'inspiration' => ' Mes origines dunkerquoises.

Le poste de secours de la plage était un lieu de rencontres, et de temps en temps une bouée de sauvetage lorsque l\'on s\'éloignait trop des kiosques des parents. ',
            'image_inspiration' => '',
            'taille' => '30 x 20',
            'category' => 'Peinture',
        ],
        37 => [
            'paint_name' => 'La Vénus de la mer',
            'description' => 'Peinture acrylique sur toile ',
            'paint_image' => 'peinture15.jpg',
            'inspiration' => 'à l\'origine un célèbre tableau de Botticelli, La naissance de Vénus. l\'objectif était de garder le principe de la mise en page du tabeau afin de le reconnaitre tout en modifiant le sujet. ',
            'image_inspiration' => '',
            'taille' => '42 x 32',
            'category' => 'Peinture',
        ],
        38 => [
            'paint_name' => 'Beyssellance',
            'description' => 'Peinture acrylique sur carton toilé. ',
            'paint_image' => 'peinture16.jpg',
            'inspiration' => 'Les randonnées dans les pyrénées sont une grande source d\'inspiration. ',
            'image_inspiration' => '',
            'taille' => '30 x 20',
            'category' => 'Peinture',
        ],
        39 => [
            'paint_name' => 'Harribet',
            'description' => 'Peinture acrylique sur carton toilé.',
            'paint_image' => 'peinture17.jpg',
            'inspiration' => 'Les randonnées dans les pyrénées sont une grande source d\'inspiration. ',
            'image_inspiration' => '',
            'taille' => '30 x 20',
            'category' => 'Peinture',
        ],
        40 => [
            'paint_name' => 'Portillon',
            'description' => 'peinture sur carton toilé. ',
            'paint_image' => 'peinture18.jpg',
            'inspiration' => 'Les randonnées dans les pyrénées sont une grande source d\'inspiration. ',
            'image_inspiration' => '',
            'taille' => '30 x 20',
            'category' => 'Peinture',
        ],
        41 => [
            'paint_name' => 'La dune du Pilat',
            'description' => '',
            'paint_image' => 'peinture20.jpg',
            'inspiration' => '',
            'image_inspiration' => '',
            'taille' => '100 x 50',
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
        foreach (self::CATEGORY as $keys=>$value) {
            $category = new Category();
            $category->setCategoryName($value['category_name']);
            $category->setCategoryImage($value['category_image']);
            $this->addReference('category_' . $value['category_name'], $category);
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
