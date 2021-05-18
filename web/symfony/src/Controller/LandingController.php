<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class LandingController extends AbstractController
{
    public function landing(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_landing_redirect');
        }

        return $this->render('landing/landing.html.twig', []);
    }

    public function landingCandidate(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_landing_redirect');
        }

        return $this->render('landing/landing_candidate.html.twig', []);
    }
    public function landingCompany(): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_landing_redirect');
        }

        return $this->render('landing/landing_company.html.twig', []);
    }

    public function landingRedirect(): Response
    {
        if ($this->getUser()) {
            if (true === $this->getUser()->isCandidate()) {
                return $this->redirectToRoute('app_candidate_dashboard');
            }
            if (true === $this->getUser()->isCompany()) {
                return $this->redirectToRoute('app_company_dashboard');
            }
        }

        return $this->redirectToRoute('app_landing');
    }
}