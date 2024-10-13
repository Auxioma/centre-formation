<?php

namespace App\Controller\Navigation;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NavBarController extends AbstractController 
{
    public function navBar()
    {
        return $this->render('_partials/navigation/header.html.twig');
    }

    public function navBarMobile()
    {
        return $this->render('_partials/navigation/mobile.html.twig');
    }
}