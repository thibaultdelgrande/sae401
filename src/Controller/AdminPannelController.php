<?php

namespace App\Controller;

use App\Repository\EscapeGameRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPannelController extends AbstractController
{
    #[Route('/admin', name: 'app_admin_pannel')]
    public function index(EscapeGameRepository $escapeGameRepository): Response
    {
        $escapeGames = $escapeGameRepository->findAll();
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_backoffice_login');
        }
        return $this->render('admin_pannel/index.html.twig', [
            'controller_name' => 'AdminPannelController',
            'escapeGames' => $escapeGames
        ]);
    }
}
