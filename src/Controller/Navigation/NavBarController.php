<?php

namespace App\Controller\Navigation;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NavBarController extends AbstractController
{
    public function __construct(
        private CategoryRepository $categoryRepository,
    ) {
    }

    public function navBar()
    {
        return $this->render('_partials/navigation/header.html.twig', [
            'categories' => $this->categoryRepository->findBy(['parent' => null]),
        ]);
    }

    public function navBarMobile()
    {
        return $this->render('_partials/navigation/mobile.html.twig');
    }
}
