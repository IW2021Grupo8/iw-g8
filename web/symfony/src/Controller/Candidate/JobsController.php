<?php

namespace App\Controller\Candidate;

use App\Entity\Inscription;
use App\Repository\InscriptionRepository;
use App\Repository\JobOfferRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JobsController extends AbstractController
{
    public function jobs(InscriptionRepository $inscriptionRepository, JobOfferRepository $jobOfferRepository): Response
    {
        $inscriptions = $inscriptionRepository->findBy(['user' => $this->getUser()]);
        $jobs = $jobOfferRepository->findAll();

        return $this->render('candidate/jobs.html.twig', [
            'inscriptions' => $inscriptions,
            'jobs' => $jobs,
        ]);
    }

    public function inscription(Request $request, int $id, InscriptionRepository $inscriptionRepository, JobOfferRepository $jobOfferRepository, EntityManagerInterface $em): Response
    {
        try {
            $job = $jobOfferRepository->find($id);

            $inscription = new Inscription();
            $inscription->setUser($this->getUser());
            $inscription->setJobOffer($job);
            $inscription->setCreationDate(new \DateTimeImmutable());

            $em->persist($inscription);
            $em->flush();
            $message = 'Se ha realizado tu inscripción correctamente.';
        } catch (\Exception $ex) {
            $message = 'Ya estás inscrito en esta oferta.';
        }

        $inscriptions = $inscriptionRepository->findBy(['user' => $this->getUser()]);


        $jobs = $jobOfferRepository->findAll();

        return $this->render('candidate/search_jobs.html.twig', [
            'message' => $message,
            'inscriptions' => $inscriptions,
            'jobs' => $jobs,
        ]);
    }
}