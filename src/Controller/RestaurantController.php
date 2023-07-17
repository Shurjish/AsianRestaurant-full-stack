<?php

namespace App\Controller;

use App\Entity\Menu;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route("/home", name:"home")]
    public function home() {
        return $this->render("Restaurant/home.html.twig");
    }

    #[Route("/about", name: "about")]
    public function about()
    {
        $texts = [
            [
                'title' => 'European Restaurant with an Oriental Twist',
                'content' => [
                    'Welcome to our European restaurant with a captivating twist of Oriental flavors. Our restaurant takes you on a culinary journey through the vibrant cuisines of Japan, China, Vietnam, and Thailand.',
                    'Immerse yourself in the artistry of our kitchen as our skilled chefs combine the techniques and ingredients of the East with the classic flavors of Europe. Each dish is carefully crafted to harmonize the delicate balance of flavors, textures, and aromas, creating a dining experience that is both familiar and adventurous.',
                    'From the subtle elegance of sushi to the bold spices of Szechuan cuisine, our menu showcases the best of both worlds, delighting your taste buds and satisfying your culinary curiosity.',
                ],
            ],
            [
                'title' => 'A Journey Inspired by the East',
                'content' => [
                    'Embark on a gastronomic adventure as we share the inspiring story of our journey through Asia. It all began with three passionate partners who had a deep fascination with the rich culinary traditions of the Far East.',
                    'Driven by their desire to bring the authentic flavors of Japan, China, Vietnam, and Thailand to the European dining scene, they set off on a voyage of discovery. They ventured into bustling street markets, explored hidden food stalls, and learned from local chefs who graciously shared their age-old recipes and techniques.',
                    'Through their travels, they gained a profound appreciation for the diversity and depth of Asian cuisine. Today, their shared vision has become a reality, and our restaurant stands as a testament to their dedication and love for the gastronomic treasures of the Orient.',
                ],
            ],
            [
                'title' => 'Praise from Gastronomic Connoisseurs',
                'content' => [
                    'We take great pride in the recognition and accolades we have received from gastronomic connoisseurs around the world. Renowned food critics, influential bloggers, and discerning diners have all applauded the exceptional quality and creativity of our culinary offerings.',
                    'Our commitment to using the finest ingredients, sourced locally and imported from Asia, ensures that every dish is a masterpiece of flavors and presentation. We strive to exceed the expectations of our guests and create memorable dining experiences that leave a lasting impression.',
                    'With each dish, we aim to tell a story, showcasing the depth of flavors, the cultural heritage, and the passion behind our culinary creations. We are honored to have earned the trust and admiration of those who appreciate the art of gastronomy.',
                ],
            ],
        ];

        return $this->render("Restaurant/about.html.twig", [
            'texts' => $texts,
        ]);
    }

    #[Route("/menu", name: "menu")]
    public function menu(): Response
    {
        $repository = $this->entityManager->getRepository(Menu::class);
        $existingDishes = $repository->findAll();

        $repository = $this->entityManager->getRepository(Menu::class);
        $japanese = $repository->findBy(['category' => 'Japanese Cuisine']);
        $chinese = $repository->findBy(['category' => 'Chinese Cuisine']);
        $vietnamese = $repository->findBy(['category' => 'Vietnamese Cuisine']);
        $thai = $repository->findBy(['category' => 'Thai Cuisine']);
        $desserts = $repository->findBy(['category' => 'Desserts']);

        return $this->render('Restaurant/menu.html.twig', [
            'japanese' => $japanese,
            'chinese' => $chinese,
            'vietnamese' => $vietnamese,
            'thai' => $thai,
            'desserts' => $desserts
        ]);

        if (empty($existingDishes)) {

            $dish1 = new Menu();
            $dish1->setName('Chicken Karaage');
            $dish1->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/tyywsw1505930373.jpg');
            $dish1->setDescription('Karaage Chicken is one of the most popular Japanese dishes not only within Japan but abroad as well. The chicken is marinated with soy sauce, sake, ginger, and mirin to give a touch of sweetness.');
            $dish1->setCategory('Japanese Cuisine');

            $dish2 = new Menu();
            $dish2->setName('Honey Teriyaki Salmon');
            $dish2->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/xxyupu1468262513.jpg');
            $dish2->setDescription('Salmon fillets are pan-grilled until nicely golden brown but the meat is still tender and juicy. We then finish it off with a sweet-savory glazed homemade Teriyaki Sauce');
            $dish2->setCategory('Japanese Cuisine');

            $dish3 = new Menu();
            $dish3->setName('Shushi');
            $dish3->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/g046bb1663960946.jpg');
            $dish3->setDescription('sushi, a staple rice dish of Japanese cuisine, consisting of cooked rice flavoured with vinegar and a variety of vegetable, egg, or raw seafood garnishes and served cold.');
            $dish3->setCategory('Japanese Cuisine');

            $dish4 = new Menu();
            $dish4->setName('Tonkatsu pork');
            $dish4->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/lwsnkl1604181187.jpg');
            $dish4->setDescription('Tonkatsu pork is a Japanese dish that consists of a breaded, deep-fried pork cutlet. It involves coating slices of pork with panko (bread crumbs), and then frying them in oil.');
            $dish4->setCategory('Japanese Cuisine');


            $dish5 = new Menu();
            $dish5->setName('Szechuan Beef');
            $dish5->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/1529443236.jpg');
            $dish5->setDescription('This Szechuan beef is a spicy stir fry made with tender pieces of beef and colorful vegetables, all tossed in a sweet and savory sauce.');
            $dish5->setCategory('Chinese Cuisine');

            $dish6 = new Menu();
            $dish6->setName('Wontons');
            $dish6->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/1525876468.jpg');
            $dish6->setDescription('These delicious dumplings are made by filling a square wrapper made of an egg-based dough with ground pork and shrimp or other fillings, sealing the edges, and then either frying them in oil');
            $dish6->setCategory('Chinese Cuisine');

            $dish7 = new Menu();
            $dish7->setName('Shrimp Chow Fun');
            $dish7->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/1529445434.jpg');
            $dish7->setDescription('Chow fun is essentially delicate, wide flat rice noodles. If not cooked properly, then the noodles could break. Many classic Chinese recipes use chow fun.');
            $dish7->setCategory('Chinese Cuisine');

            $dish8 = new Menu();
            $dish8->setName('Sweet and Sour Pork');
            $dish8->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/1529442316.jpg');
            $dish8->setDescription('A classic Chinese sweet and sour pork stir-fry recipe made with juicy pieces of pork tenderloin, bell peppers, onion, and pineapple.');
            $dish8->setCategory('Chinese Cuisine');


            $dish9 = new Menu();
            $dish9->setName('Beef Banh Mi Bowls with Sriracha Mayo, Carrot & Pickled Cucumber');
            $dish9->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/z0ageb1583189517.jpg');
            $dish9->setDescription('Its a delicious Vietnamese dish featuring tender beef, spicy mayo, and refreshing veggies.');
            $dish9->setCategory('vietnamese Cuisine');

            $dish10 = new Menu();
            $dish10->setName('Vietnamese Grilled Pork (bun-thit-nuong)');
            $dish10->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/qqwypw1504642429.jpg');
            $dish10->setDescription('The noodles are thin rice vermicelli noodles and the meat is typically crispy grilled pork');
            $dish10->setCategory('vietnamese Cuisine');


            $dish11 = new Menu();
            $dish11->setName('Massaman Beef curry');
            $dish11->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/tvttqv1504640475.jpg');
            $dish11->setDescription('Massaman curry is mild, slightly sweet, tangy and delicious! Made with warm spices, vegetables, coconut milk, curry paste and your protein of choice.');
            $dish11->setCategory('thai Cuisine');

            $dish12 = new Menu();
            $dish12->setName('Thai Green Curry');
            $dish12->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/sstssx1487349585.jpg');
            $dish12->setDescription('In Thailand, curry is usually a soupy dish consisting of coconut milk or water, curry paste and meat.');
            $dish12->setCategory('thai Cuisine');


            $dish13 = new Menu();
            $dish13->setName('Carrot Cake');
            $dish13->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/vrspxv1511722107.jpg');
            $dish13->setDescription('Carrot cake is a sweet and moist spice cake, full of cut carrots and toasted nuts, and covered in cream cheese icing.');
            $dish13->setCategory('desserts');

            $dish14 = new Menu();
            $dish14->setName('New York cheesecake');
            $dish14->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/swttys1511385853.jpg');
            $dish14->setDescription('New York-style cheesecake uses a cream cheese base, also incorporating heavy cream or sour cream.');
            $dish14->setCategory('desserts');

            $dish15 = new Menu();
            $dish15->setName('Pumpkin Pie');
            $dish15->setImage('https:\/\/www.themealdb.com\/images\/media\/meals\/usuqtp1511385394.jpg');
            $dish15->setDescription('Pumpkin pie is a traditional dessert made with a warm spiced pumpkin custard filling and flaky pie crust.');
            $dish15->setCategory('desserts');

            $this->entityManager->persist($dish1);
            $this->entityManager->persist($dish2);
            $this->entityManager->persist($dish3);
            $this->entityManager->persist($dish4);
            $this->entityManager->persist($dish5);
            $this->entityManager->persist($dish6);
            $this->entityManager->persist($dish7);
            $this->entityManager->persist($dish8);
            $this->entityManager->persist($dish9);
            $this->entityManager->persist($dish10);
            $this->entityManager->persist($dish11);
            $this->entityManager->persist($dish12);
            $this->entityManager->persist($dish13);
            $this->entityManager->persist($dish14);
            $this->entityManager->persist($dish15);

            $this->entityManager->flush();
        }

        $dishes = $repository->findAll();

        return $this->render('Restaurant/menu.html.twig', [
            'dishes' => $dishes
        ]);
    }

    #[Route("/booking", name:"booking")]
    public function booking() {
        return $this->render("Restaurant/restaurant.html.twig");
    }

    #[Route("/login", name:"login")]
    public function login() {
        return $this->render("Restaurant/restaurant.html.twig");
    }

    #[Route("/register", name:"register")]
    public function register() {
        return $this->render("Restaurant/restaurant.html.twig");
    }
}