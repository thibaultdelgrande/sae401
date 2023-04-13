<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EscapeGameRepository;

class AdventureController extends AbstractController
{
    #[Route('/adventure', name: 'app_adventure')]
    public function index(EscapeGameRepository $escapeGameRepository): Response
    {
        $escapeGames = $escapeGameRepository->findAll();
        return $this->render('adventure/index.html.twig', [
            'controller_name' => 'AdventureController',
            'escapeGames' => $escapeGames
        ]);
    }
}
