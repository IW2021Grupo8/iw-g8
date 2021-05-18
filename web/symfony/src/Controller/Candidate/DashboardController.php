<?php

namespace App\Controller\Candidate;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends AbstractController
{
    public function dashboard(): Response
    {
        return $this->redirectToRoute('app_candidate_search_jobs');

        return $this->render('candidate/dashboard.html.twig', []);
    }
}