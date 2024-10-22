<?php

namespace App\Controller\Courses;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LessonsController extends AbstractController
{
    #[Route('/{n1}/{n2}/{n3}/{n4}/{n5}', name: 'app_lessons')]
    public function index(): Response
    {

        return $this->render('lessons/index.html.twig', [
            'controller_name' => 'LessonsController',
        ]);
    }
}
