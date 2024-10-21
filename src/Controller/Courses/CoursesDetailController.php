<?php

namespace App\Controller\Courses;

use App\Entity\Courses;
use App\Repository\CoursesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CoursesDetailController extends AbstractController
{
    public function __construct(
        private readonly CoursesRepository $coursesRepository 
    ){}

    #[Route('/{n1}/{n2}/{n3}/{n4}', name: 'app_detail')]
    public function detail($n4): Response
    {
        $course = $this->coursesRepository->findOneBySlug($n4);
       

        return $this->render('courses/details.html.twig', [
            'courses' => $course
        ]);
    }
}
