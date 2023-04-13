<?php

namespace App\Controller;

use App\Entity\EscapeGame;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteEscapeGameController extends AbstractController
{
    #[Route('/{id}/delete', name: 'app_delete_escape_game', methods: ['GET', 'POST'])]
    public function index(EntityManagerInterface $manager, EscapeGame $escapeGame): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_backoffice_login');
        }

        if (!$escapeGame){
            $this->addFlash('danger', 'The escape game does not exist !');
            return $this->redirectToRoute('app_admin_pannel');
        }

        $this->addFlash('success', 'The escape was deleted !');

        $manager->remove($escapeGame);
        $manager->flush();
        return $this->redirectToRoute('app_admin_pannel');
    }
}
