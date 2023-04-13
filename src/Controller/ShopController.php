<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EscapeGameRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'app_shop')]
    public function index(EscapeGameRepository $escapeGameRepository,TranslatorInterface $translator,Request $request): Response
    {
        $escapeGames = $escapeGameRepository->findAll();
        $locale = $request->get('lang', $request->getLocale());
        $translator->setLocale($locale);
        return $this->render('shop/index.html.twig', [
            'controller_name' => 'ShopController',
            'escapeGames' => $escapeGames
        ]);
    }
}
