<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EscapeGameRepository;
use Symfony\Contracts\Translation\TranslatorInterface;

class AdventureController extends AbstractController
{
    #[Route('/adventure', name: 'app_adventure')]
    public function index(EscapeGameRepository $escapeGameRepository,TranslatorInterface $translator,Request $request): Response
    {
        $escapeGames = $escapeGameRepository->findAll();
        $locale = $request->get('lang', $request->getLocale());
        $translator->setLocale($locale);
        return $this->render('adventure/index.html.twig', [
            'controller_name' => 'AdventureController',
            'escapeGames' => $escapeGames
        ]);
    }
}
