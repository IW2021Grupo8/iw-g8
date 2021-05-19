<?php

namespace App\Controller\Candidate;

use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SearchJobsController extends AbstractController
{
    public function search(JobOfferRepository $jobOfferRepository): Response
    {
        $jobs = $jobOfferRepository->findAll();

        return $this->render('candidate/search_jobs.html.twig', [
            'jobs' => $jobs
        ]);
    }
}