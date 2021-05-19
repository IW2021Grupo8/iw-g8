<?php

namespace App\Controller\Candidate;

use App\Repository\InscriptionRepository;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class JobsController extends AbstractController
{
    public function jobs(InscriptionRepository $inscriptionRepository, JobOfferRepository $jobOfferRepository): Response
    {
        $inscriptions = $inscriptionRepository->findBy(['user' => $this->getUser()]);
        $jobs = $jobOfferRepository->all();

        return $this->render('candidate/jobs.html.twig', [
            'inscriptions' => $inscriptions,
            'jobs' => $jobs,
        ]);
    }
}