<?php

namespace App\Controller;

use App\Entity\Program;
use App\Entity\SignUp;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    #[Route('/user', name: 'user_program')]
    public function user(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['cnp']) && validCNP($_POST['cnp'])) {

                $entityManager = $this->getDoctrine()->getManager();

                $sign_up = new SignUp();
                if (isset($_POST['cnp']) && isset($_POST['session'])){
                    $sign_up->setCnp(1);
                    $program = $this->getDoctrine()
                    ->getRepository(Program::class)
                    ->find($_POST['session']);
                    $sign_up->addSession( $program);
                    $sign_up->setVnp($_POST['cnp']);
                } else {
                    return new Response('The data are not enough');
                }
                $entityManager->persist($sign_up);
                $entityManager->flush();
                return new Response('You was added at training no: '.$_POST['session']);
            }
        }
        return new Response('You are not authorized to register for the course!');
    }

    #[Route('/program', name: 'program')]
    public function createProgram(): Response{
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['admin']) && $_POST['admin'] == '246080d25b4b620f925664c1147185f1') {

                $entityManager = $this->getDoctrine()->getManager();
                
                $program = new Program();
                if (isset($_POST['start']) && isset($_POST['end']) && isset($_POST['max']) && isset($_POST['room']) && isset($_POST['name'])){
                    $program->setStart(new DateTime($_POST['start']));
                    $program->setEnd(new DateTime($_POST['end']));
                    $program->setMaxUsers($_POST['max']);
                    $program->setRoomName($_POST['room']);
                    $program->setName($_POST['name']);
                } else {
                    return new Response('The data are not enough');
                }
                $programs = $this->getDoctrine()->getRepository(Program::class)->findAll();
                if (overlapingFree($program, $programs)){
                    $entityManager->persist($program);
                    $entityManager->flush();
                } else {
                    return new Response('It is overlaping another program in room: '.$program->getRoomName());
                }

                return new Response('The program was saved with the ID:  '.$program->getId());
            } else {
                return new Response('You are not authorized to add an program!');
            }

        } else {
            return new Response('Is not a method '.$_SERVER['REQUEST_METHOD']);
        }
    }
}
