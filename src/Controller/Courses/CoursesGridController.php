<?php

namespace App\Controller\Courses;

use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CoursesGridController extends AbstractController
{
    public function __construct(
        private CategoryRepository $categoryRepository,
    ){}

    #[Route('/{n1}', name: 'app_courses_n1')]
    #[Route('/{n1}/{n2}', name: 'app_courses_n2')]
    #[Route('/{n1}/{n2}/{n3}', name: 'app_courses_n3')]
    public function grid(string $n1, ?string $n2 = null, ?string $n3 = null, Request $request, PaginatorInterface $paginator): Response
    {
        // find courses by level
        $fincourses = $this->categoryRepository->findByLevel($n1, $n2, $n3);

        $ShowCourses = [];
        // je vvais faire l'optimisation par la suite, je vais faire de l'affichage des cours par niveau
        if ('app_courses_n3' === $request->attributes->get('_route')) {    
            foreach ($fincourses as $course) {
                $i = $course->getCourses();
                foreach ($i as $item) {
                    $ShowCourses[] = [
                        'name' => $item->getTitle(),
                        'user' => $item->getUser()->getUsername(),
                        'image' => $item->getPicture(),
                        'catName' => $item->getCategory()->getName(),
                        'n1' => $n1,
                        'n2' => $n2,
                        'n3' => $n3,
                        'n4' => $item->getSlug(),
                    ];
                }
            }
        }

        if ('app_courses_n2' === $request->attributes->get('_route')) {
            foreach ($fincourses as $levelN3) {
                $level = $levelN3->getCategories();
                foreach ($level as $course) {
                    $i = $course->getCourses();
                    foreach ($i as $item) {
                        $ShowCourses[] = [
                            'name' => $item->getTitle(),
                            'user' => $item->getUser()->getUsername(),
                            'image' => $item->getPicture(),
                            'catName' => $item->getCategory()->getName(),
                            'n1' => $n1,
                            'n2' => $n2,
                            'n3' => $item->getCategory()->getSlug(),
                            'n4' => $item->getSlug(),
                        ];
                    }
                }
                
            }
        }

        if ('app_courses_n1' === $request->attributes->get('_route')) {  
            foreach ($fincourses as $levelN2) {
                $level = $levelN2->getCategories();
                 
                foreach ( $level as $levelN3 ) {
                    $ln3 = $levelN3->getCategories();
                    $n2 = $levelN3->getSlug(); 
                    foreach ( $ln3 as $course ) {
                        $i = $course->getCourses();
                        foreach ($i as $item) {
                            $ShowCourses[] = [
                                'name' => $item->getTitle(),
                                'user' => $item->getUser()->getUsername(),
                                'image' => $item->getPicture(),
                                'catName' => $item->getCategory()->getName(),
                                'n1' => $n1,
                                'n2' => $n2,
                                'n3' => $item->getCategory()->getSlug(),
                                'n4' => $item->getSlug(),
                            ];
                        }  
                    }
                }
            }
        }

        $pagination = $paginator->paginate(
            $ShowCourses, /* query NOT result */
            $request->query->getInt('page', 1), /* page number */
            9 /* limit per page */
        );

        return $this->render('courses/grid.html.twig', [
            'courses' => $pagination,
        ]);
    }
}
