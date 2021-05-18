<?php

namespace App\Controller\Company;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends AbstractController
{
    public function dashboard(): Response
    {
        return $this->render('candidate/dashboard.html.twig', []);
    }
}