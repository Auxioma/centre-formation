<?php

namespace App\Controller\Courses;

use App\Repository\CoursesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoursesGridController extends AbstractController
{
    public function __construct(
        private CoursesRepository $coursesRepository
    ){}

    #[Route('/{n1}', name: 'app_courses_n1')]
    #[Route('/{n1}/{n2}', name: 'app_courses_n2')]
    #[Route('/{n1}/{n2}/{n3}', name: 'app_courses_n3')]
    public function grid(?string $n2 = null, ?string $n3 = null, string $n1): Response
    {
        // find courses by level
        $fincourses = $this->coursesRepository->findByLevel($n2, $n3, $n1);


        return $this->render('courses/grid.html.twig');
    }
}
