<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    #[Route('/program/{id}', name: 'program_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showProgram(int $id): Response
    // public function show(int $id)
    {
        $title = "Programme $id";

        return $this->render('program/show.html.twig', [
            'title' => $title,
        ]);
    }
}

// class ProgramController extends AbstractController
// {
//     #[Route('/program', name: 'program_index')]
//     public function index(): Response
//     {
//         return $this->render('program/index.html.twig', [
//             'website' => 'Wild Series',
//          ]);
//     }
// }
