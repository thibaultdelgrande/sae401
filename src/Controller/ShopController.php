<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EscapeGameRepository;


class ShopController extends AbstractController
{
    #[Route('/shop', name: 'app_shop')]
    public function index(EscapeGameRepository $escapeGameRepository): Response
    {
        $escapeGames = $escapeGameRepository->findAll();
        return $this->render('shop/index.html.twig', [
            'controller_name' => 'ShopController',
            'escapeGames' => $escapeGames
        ]);
    }
}
