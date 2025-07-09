<?php

namespace App\Controller\Menu;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MenuController extends AbstractController
{

    public function __construct(
        private readonly CategoryRepository $categoryRepository
    ){}

    public function index(): Response
    {
         return $this->render('_partials/_header.html.twig', [
            'categories' => $this->categoryRepository->findBy(['parent' => null])
        ]);
    }
}