<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Courses;
use App\Entity\Lessons;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/page/login.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Centre Formation');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);

        yield MenuItem::linkToCrud('Catégories', 'fas fa-user', Category::class);
        
        yield MenuItem::linkToCrud('Titre des cours', 'fas fa-user', Courses::class);
        yield MenuItem::linkToCrud('Contenue des lessons', 'fas fa-user', Lessons::class);


    }
}
