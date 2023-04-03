<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackofficeLoginController extends AbstractController
{
    #[Route('/login', name: 'app_backoffice_login', methods: ['GET', 'POST'])]
    public function login(): Response
    {
        return $this->render('backoffice_login/index.html.twig', [
            'controller_name' => 'BackofficeLoginController',
        ]);
    }

    #[Route('/logout', name: 'app_backoffice_logout')]
    public function logout(): void
    {
        // Rien à faire ici, c'est Symfony qui gère la déconnexion
    }
}
