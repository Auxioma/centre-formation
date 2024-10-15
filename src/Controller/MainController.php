<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository
    ){}

    #[Route('/', name: 'app_main', methods: ['GET'])]
    public function index(): Response
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
                        'popular' => $p->getPopular()
                    ];
                }
            }
        }
        
        usort($result, function($a, $b) {
            return $b['popular'] <=> $a['popular'];
        });

        $result = array_slice($result, 0, 6);  
        
        return $this->render('main/index.html.twig', [
            'PopularCategory' => $result
        ]);
    }
}
