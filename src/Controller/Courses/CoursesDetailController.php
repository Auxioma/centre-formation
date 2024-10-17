<?php

namespace App\Controller\Courses;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoursesDetailController extends AbstractController
{
    #[Route('/detail', name: 'app_detail')]
    public function detail(): Response
    {
        return $this->render('courses/details.html.twig');
    }
}