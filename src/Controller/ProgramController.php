<?php

namespace App\Controller;

use App\Entity\Program;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    #[Route('/program', name: 'program')]
    public function createProgram(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $program = new Program();
        $program->setStart(new DateTime("04/19/2021 14:00:00"));
        $program->setEnd(new DateTime("04/19/2021 15:00:00"));
        $program->setMaxUsers(21);
        $program->setRoomName('Room1');

        // tell Doctrine you want to save the Program
        $entityManager->persist($program);

        // actually executes
        $entityManager->flush();

        return new Response('S-a salvat programul cu ID-ul: '.$program->getId());
    }
    // public function index(): Response
    // {
    //     return $this->json([
    //         'message' => 'Welcome to your new controller!',
    //         'path' => 'src/Controller/ProgramController.php',
    //     ]);
    // }
}
