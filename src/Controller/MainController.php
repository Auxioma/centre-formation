<?php

namespace App\Controller;

use App\Entity\Form\Contact;
use App\Form\ContactFormType;
use App\Repository\CategoryRepository;
use App\Repository\CoursesRepository;
use Doctrine\Common\Collections\Criteria;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
        private readonly CoursesRepository $coursesRepository,
    ) {
    }

    #[Route('/', name: 'app_main', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $categories = $this->categoryRepository->findAll();

        $result = [];
        foreach ($categories as $category) {
            foreach ($category->getCategories() as $product) {
                $productCategories = $product->getCategories()->matching(
                    Criteria::create()
                        ->orderBy(['popular' => Criteria::DESC])
                        ->setMaxResults(6)
                );

                foreach ($productCategories as $p) {
                    $result[] = [
                        'name' => $p->getName(),
                        'meta' => mb_strimwidth($p->getMetaTitle(), 0, 35, '...'),
                        'n1' => $category->getSlug(),
                        'n2' => $product->getSlug(),
                        'n3' => $p->getSlug(),
                        'popular' => $p->getPopular(),
                    ];
                }
            }
        }

        usort($result, function ($a, $b) {
            return $b['popular'] <=> $a['popular'];
        });

        $result = array_slice($result, 0, 6);

        // je vais prendre 6 lesson et de manière aléatoire
        $lessons = $this->coursesRepository->Find6CoursesForMainPage();

        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);

        return $this->render('main/index.html.twig', [
            'PopularCategory' => $result,
            'lessons' => $lessons,
            'form' => $form->createView(),
        ]);
    }
}
