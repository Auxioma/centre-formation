<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoriesData = [
            [1, 'Développeur Web et Web Mobile', 'developpeur-web-et-web-mobile', null, false, 'Formation complète en Développement Web et Web Mobile | Apprenez à concevoir des sites et des applications mobiles avec HTML, CSS, JavaScript, PHP, MySQL, et les meilleurs outils Front-End et Back-End', 'Apprenez à créer des sites web et des applications mobiles avec les compétences essentielles de développeur web.', null, 92],
            [3, 'Front-End', 'front-end', 1, false, 'Maîtrisez le développement Front-End | Apprenez HTML, CSS, JavaScript et les frameworks modernes pour concevoir des interfaces utilisateur performantes et esthétiques adaptées à tous les appareils', 'Maîtrisez le développement Front-End avec HTML, CSS, JavaScript et frameworks modernes.', null, 37],
            [4, 'HTML & CSS', 'html-css', 3, false, 'Formation HTML et CSS | Apprenez les bases du développement web avec HTML pour structurer vos pages et CSS pour les styliser, rendant vos sites plus professionnels et fonctionnels', 'Apprenez à structurer et styliser vos pages web avec HTML et CSS.', null, 8],
            [5, 'Responsive Design', 'responsive-design', 3, false, 'Apprenez le Responsive Design | Créez des sites web adaptatifs qui s\'affichent parfaitement sur tous les types d\'écrans et appareils, en utilisant les meilleures techniques de design web', 'Créez des sites web adaptatifs pour tous les écrans avec le responsive design.', null, 33],
            [6, 'JavaScript', 'javascript', 3, false, 'Formation complète en JavaScript | Apprenez à maîtriser JavaScript, le langage de programmation incontournable pour créer des interactions dynamiques et réactives sur vos sites et applications web', 'Apprenez à programmer en JavaScript, le langage incontournable du web.', null, 40],
            [7, 'Frameworks Front-End', 'frameworks-front-end', 3, false, 'Frameworks Front-End | Maîtrisez les frameworks JavaScript les plus populaires comme React et Angular pour développer des interfaces utilisateur performantes et dynamiques avec des composants réutilisables', 'Découvrez les frameworks Front-End les plus populaires comme React et Angular.', null, 100],
            [8, 'Back-End', 'back-end', 1, false, 'Formation en Développement Back-End | Apprenez à gérer le serveur, la base de données et la logique d\'application avec des technologies comme PHP, MySQL, et des frameworks robustes', 'Développez vos compétences Back-End avec des technologies comme PHP, MySQL et plus.', null, 79],
            [9, 'PHP & MySQL', 'php-mysql', 8, false, 'Apprenez PHP et MySQL | Développez des applications web dynamiques avec PHP pour la logique serveur et MySQL pour la gestion efficace des bases de données relationnelles, avec des exemples concrets', 'Créez des sites dynamiques avec PHP et des bases de données MySQL.', null, 95],
            [10, 'Création d\'API REST', 'creation-api-rest', 8, false, 'Apprenez à créer des API REST | Développez des interfaces de programmation robustes avec les API REST, facilitant l\'interaction entre les systèmes pour des applications web modernes et scalables', 'Apprenez à créer des API RESTful pour des applications web modernes.', null, 37],
            [11, 'Frameworks Back-End', 'frameworks-back-end', 8, false, 'Frameworks Back-End | Découvrez les meilleurs frameworks comme Symfony et Laravel pour accélérer le développement d\'applications Back-End robustes, évolutives et sécurisées', 'Explorez les principaux frameworks Back-End comme Symfony et Laravel.', null, 999999],
            [12, 'Bases NoSQL', 'bases-nosql', 8, false, 'Bases de Données NoSQL | Explorez les bases de données NoSQL comme MongoDB et apprenez comment elles permettent de gérer des données massives, non structurées, et évolutives pour des applications modernes', 'Apprenez à utiliser des bases de données NoSQL comme MongoDB.', null, 33],
            [13, 'Déploiement et Hébergement', 'deploiement-hebergement', 1, false, 'Apprenez le déploiement et l\'hébergement web | Maîtrisez les techniques pour déployer vos applications web sur des serveurs et les héberger dans les environnements cloud pour une meilleure disponibilité', 'Apprenez à déployer et héberger vos applications web sur le cloud.', null, 62],
            [14, 'Git et GitHub', 'git-github', 13, false, 'Formation Git et GitHub | Apprenez à gérer le versioning de votre code avec Git et collaborez efficacement avec votre équipe sur des projets de développement via la plateforme GitHub', 'Apprenez à versionner votre code avec Git et à collaborer sur GitHub.', null, 30],
            [15, 'Serveurs Web', 'serveurs-web', 13, false, 'Serveurs Web | Découvrez comment configurer, sécuriser et maintenir des serveurs web performants pour héberger des sites internet et des applications web de manière fiable et évolutive', 'Apprenez à configurer et gérer des serveurs web pour héberger vos applications.', null, 68],
            [16, 'Déploiement Cloud', 'deploiement-cloud', 13, false, 'Déploiement Cloud | Maîtrisez les outils et techniques pour déployer vos applications web dans le cloud, en utilisant des services comme AWS pour une meilleure évolutivité et performance', 'Découvrez comment déployer vos applications sur le cloud avec des outils comme AWS.', null, 46],
            [17, 'Concepteur Développeur d\'Applications', 'concepteur-developpeur-applications', null, false, 'Formation complète Concepteur Développeur d\'Applications | Apprenez à concevoir et développer des applications performantes et innovantes avec des compétences en analyse, conception, développement et tests', 'Apprenez à concevoir et développer des applications web et mobiles.', null, 29],
            [18, 'Analyse et Conception', 'analyse-conception', 17, false, 'Analyse et Conception | Apprenez les méthodologies d\'analyse des besoins et de conception logicielle pour créer des solutions robustes, modulaires et adaptées aux besoins de vos clients', 'Apprenez à analyser les besoins et à concevoir des solutions logicielles adaptées.', null, 4],
            [19, 'Modélisation UML', 'modelisation-uml', 18, false, 'Modélisation UML | Utilisez UML pour représenter visuellement la structure et le fonctionnement de vos systèmes logiciels, facilitant la compréhension et la communication entre les équipes', 'Utilisez UML pour modéliser et planifier vos projets logiciels.', null, 38],
            [20, 'Architecture Logicielle', 'architecture-logicielle', 18, false, 'Architecture Logicielle | Apprenez à concevoir l\'architecture logicielle de vos projets pour garantir des solutions évolutives, performantes et maintenables, adaptées aux besoins du client', 'Apprenez à concevoir l\'architecture de vos projets logiciels pour une meilleure performance.', null, 77],
            [21, 'Interfaces Utilisateur', 'interfaces-utilisateur', 17, false, 'Développement d\'Interfaces Utilisateur | Apprenez à créer des interfaces utilisateur ergonomiques, performantes et esthétiques en utilisant des outils et techniques modernes comme JavaScript et CSS avancé', 'Créez des interfaces utilisateur performantes et ergonomiques.', null, 69],
            [22, 'JavaScript Avancé', 'javascript-avance', 21, false, 'JavaScript Avancé | Approfondissez vos connaissances en JavaScript avec des concepts avancés comme la gestion des événements, l\'asynchrone, les promesses, et les architectures complexes', 'Approfondissez vos connaissances en JavaScript avec des concepts avancés.', null, 14],
            [23, 'Angular & React', 'angular-react', 21, false, 'Angular et React | Maîtrisez Angular et React, les deux frameworks JavaScript les plus populaires pour construire des applications web dynamiques, performantes et maintenables à grande échelle', 'Maîtrisez les frameworks JavaScript Angular et React pour le développement web.', null, 66],
            [24, 'Composants Métier', 'composants-metier', 17, false, 'Développement des Composants Métier | Apprenez à concevoir et implémenter des composants métier dans vos applications pour structurer la logique fonctionnelle et faciliter la maintenance et l\'évolutivité', 'Apprenez à concevoir des composants métier robustes pour vos applications.', null, 84],
            [25, 'Java & Spring Boot', 'java-spring-boot', 24, false, 'Java & Spring Boot | Développez des applications web robustes avec Java et Spring Boot, l\'un des frameworks les plus puissants et flexibles pour créer des API et des services back-end performants', 'Créez des applications web avec Java et Spring Boot.', null, 21],
            [26, 'Framework .NET', 'framework-dotnet', 24, false, 'Framework .NET | Apprenez à utiliser le framework .NET pour développer des applications performantes, évolutives et sécurisées, qu\'il s\'agisse de solutions web, desktop ou cloud', 'Découvrez les possibilités offertes par le framework .NET pour le développement d\'applications.', null, 58],
            [27, 'Bases de Données et API', 'bases-donnees-api', 17, false, 'Bases de Données et API | Apprenez à concevoir, gérer et interagir avec des bases de données relationnelles et NoSQL, ainsi qu\'à créer des API robustes pour vos applications web', 'Apprenez à concevoir et interagir avec des bases de données et des API.', null, 24],
            [28, 'Bases Relationnelles', 'bases-relationnelles', 27, false, 'Bases Relationnelles | Maîtrisez les concepts des bases de données relationnelles pour stocker, gérer et interroger efficacement des données avec SQL, en créant des schémas optimisés', 'Maîtrisez les bases de données relationnelles pour stocker et gérer vos données.', null, 50],
            [29, 'Développement d\'API', 'developpement-api', 27, false, 'Développement d\'API | Apprenez à concevoir des API performantes et sécurisées, permettant à vos applications d\'interagir efficacement avec des systèmes externes et des bases de données', 'Apprenez à concevoir et développer des API pour des applications web.', null, 74],
            [30, 'Bases NoSQL', 'bases-nosql', 27, false, 'Bases NoSQL | Explorez les bases de données NoSQL pour stocker des données massives, non structurées et évolutives, et apprenez à les intégrer dans des architectures modernes', 'Explorez les bases de données NoSQL et leurs applications.', null, 22],
            [31, 'Tests et Déploiement', 'tests-deploiement', 17, false, 'Tests et Déploiement | Apprenez à implémenter des stratégies de tests et à déployer vos applications dans des environnements de production avec des outils modernes comme CI/CD et Docker', 'Apprenez les meilleures pratiques de tests et de déploiement dans le développement.', null, 87],
            [32, 'Tests Unitaires', 'tests-unitaires', 31, false, 'Tests Unitaires | Apprenez à écrire des tests unitaires efficaces pour garantir la stabilité et la qualité de votre code, avec des frameworks comme PHPUnit, Jasmine ou Mocha', 'Apprenez à écrire des tests unitaires pour garantir la qualité de votre code.', null, 69],
            [33, 'CI/CD et DevOps', 'ci-cd-devops', 31, false, 'CI/CD et DevOps | Maîtrisez l\'intégration continue (CI), le déploiement continu (CD), et les pratiques DevOps pour automatiser le déploiement et améliorer la qualité de vos projets logiciels', 'Intégrez l\'automatisation et les pratiques DevOps dans vos projets de développement.', null, 84]
        ];

        foreach ($categoriesData as [$id, $name, $slug, $parentId, $isOnline, $metaTitle, $metaDescription, $image, $popular]) {
            $category = new Category();
            $category->setName($name)
                ->setSlug($slug)
                ->setOnline($isOnline)
                ->setMetaTitle($metaTitle)
                ->setMetaDescription($metaDescription)
                ->setImage($image)
                ->setPopular($popular);

            if ($parentId !== null) {
                $parent = $this->getReference('category_' . $parentId);
                $category->setParent($parent);
            }

            $manager->persist($category);
            $this->addReference('category_' . $id, $category);
        }

        $manager->flush();
    }
}
