<?php

namespace App\Controller;

use App\Form\EscapeGameType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\EscapeGame;

class CreateEscapeGameController extends AbstractController
{
    #[Route('/new', name: 'app_create_escape_game', methods: ['GET', 'POST'])]
    public function index( Request $request, EntityManagerInterface $manager): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_backoffice_login');
        }

        $escapeGame = New EscapeGame();
        $form = $this->createForm(EscapeGameType::class, $escapeGame);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $escapeGame = $form->getData();

            $manager->persist($escapeGame);
            $manager->flush();

            return $this->redirectToRoute('app_admin_pannel');  
        }


        return $this->render('edition_escape_game/index.html.twig', [
            'controller_name' => 'EditionEscapeGameController',
            'escapeGame' => $escapeGame,
            'form' => $form->createView(),
        ]);

    }
}
