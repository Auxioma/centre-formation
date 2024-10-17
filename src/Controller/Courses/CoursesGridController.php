<?php

namespace App\Controller\Courses;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoursesGridController extends AbstractController
{
    #[Route('/courses', name: 'app_courses')]
    public function grid(): Response
    {
        return $this->render('courses/grid.html.twig');
    }
}