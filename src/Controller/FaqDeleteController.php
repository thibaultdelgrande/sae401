<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Faq;
use Doctrine\ORM\EntityManagerInterface;

class FaqDeleteController extends AbstractController
{
    #[Route('/faq/{id}/delete', name: 'app_faq_delete')]
    public function index(EntityManagerInterface $manager, Faq $faq, $id): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_backoffice_login');
        }

        if (!$faq){
            $this->addFlash('danger', 'The question does not exist !');
            return $this->redirectToRoute('app_admin_pannel');
        }

        $this->addFlash('success', 'The question was deleted !');

        $manager->remove($faq);
        $manager->flush();
        return $this->redirectToRoute('app_admin_pannel');
    }
}
