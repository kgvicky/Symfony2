<?php

namespace App\Controller;


use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProgramRepository;

#[Route('/program', name: 'program_')]
Class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response

    {
        $programs = $programRepository->findAll();

        return $this->render('program/index.html.twig', [

            'programs' => $programs,

        ]);

    }
    #[Route('/show/{id<^[0-9]+$>}', name: 'show')]
    public function show(int $id, ProgramRepository $programRepository, SeasonRepository $seasonRepository):Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);


        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$id.' found in program\'s table.'
            );
        }

        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }

    #[Route('/{programId}/seasons/{seasonId}', name: 'season_show')]
    public function showSeason(int $programId, int $seasonId, ProgramRepository $programRepository, SeasonRepository $seasonRepository): Response
    {
        $program = $programRepository->findOneBy(['id' => $programId]);
        if (!$program) {
            throw $this->createNotFoundException('Program not found');
        }

        $season = $seasonRepository->findOneBy(['id' => $seasonId, 'program' => $program]);
        if (!$season) {
            throw $this->createNotFoundException('Season not found');
        }

        return $this->render('program/season_show.html.twig', [
            'program' => $program,
            'season' => $season,
        ]);

    }
}
