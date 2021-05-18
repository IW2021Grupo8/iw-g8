<?php

namespace App\Controller\Candidate;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SearchJobsController extends AbstractController
{
    public function search(): Response
    {
        return $this->render('candidate/search_jobs.html.twig', [
            'jobs' => []
        ]);
    }
}