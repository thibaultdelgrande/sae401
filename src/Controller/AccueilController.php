<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EscapeGameRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(EscapeGameRepository $escapeGameRepository, TranslatorInterface $translator, Request $request): Response
    {        
        $escapeGames = $escapeGameRepository->findAll();

        $locale = $request->get('lang', $request->getLocale());
        $translator->setLocale($locale);

        $url = $request->getPathInfo() . '?lang=' . $locale;

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'escapeGames' => $escapeGames,
            'url' => $url,
        ]);
    }
}
