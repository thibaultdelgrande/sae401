<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EscapeGameRepository;

class AdminPannelController extends AbstractController
{
    #[Route('/admin', name: 'app_admin_pannel')]
    public function index(EscapeGameRepository $escapeGameRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_backoffice_login');
        }

        $escapeGames = $escapeGameRepository->findAll();
        return $this->render('admin_pannel/index.html.twig', [
            'controller_name' => 'AdminPannelController',
            'escapeGames' => $escapeGames,
        ]);
    }
}
