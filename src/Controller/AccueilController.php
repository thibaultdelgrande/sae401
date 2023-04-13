<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EscapeGameRepository;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(EscapeGameRepository $escapeGameRepository): Response
    {
        $escapeGames = $escapeGameRepository->findAll();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'escapeGames' => $escapeGames
        ]);
    }
}
