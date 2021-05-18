<?php

namespace App\Controller\Candidate;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class JobsController extends AbstractController
{
    public function jobs(): Response
    {
        return $this->render('candidate/jobs.html.twig', []);
    }
}