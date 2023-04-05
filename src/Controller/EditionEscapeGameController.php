<?php

namespace App\Controller;

use App\Form\EscapeGameType;
use App\Repository\EscapeGameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EditionEscapeGameController extends AbstractController
{
    #[Route('/admin/game/{id}', name: 'app_edition_escape_game', methods: ['GET', 'POST'])]
    public function index($id, EscapeGameRepository $escapeGameRepository, Request $request, EntityManagerInterface $manager): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_backoffice_login');
        }

        $escapeGame = $escapeGameRepository->findOneBy(['id' => $id]);
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
