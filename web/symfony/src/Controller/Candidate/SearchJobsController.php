<?php

namespace App\Controller\Candidate;

use App\Repository\InscriptionRepository;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SearchJobsController extends AbstractController
{
    public function search(InscriptionRepository $inscriptionRepository, JobOfferRepository $jobOfferRepository): Response
    {
        $inscriptions = $inscriptionRepository->findBy(['user' => $this->getUser()]);
        $jobs = $jobOfferRepository->findAll();

        return $this->render('candidate/search_jobs.html.twig', [
            'inscriptions' => $inscriptions,
            'jobs' => $jobs
        ]);
    }
}