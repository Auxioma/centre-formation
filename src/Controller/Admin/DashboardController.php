<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    public function indexdashboard(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function analytics(): Response
    {
        return $this->render('admin/analytics.html.twig');
    }

    public function finance(): Response
    {
        return $this->render('admin/finance.html.twig');
    }

    public function crypto(): Response
    {
        return $this->render('admin/crypto.html.twig');
    }

}
