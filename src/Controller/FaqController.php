<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FaqRepository;

class FaqController extends AbstractController
{
    #[Route('/faq', name: 'app_faq')]
    public function index(FaqRepository $faqRepository): Response
    {
        $faq=$faqRepository->findAll();
        return $this->render('faq/index.html.twig', [
            'controller_name' => 'FaqController',
            'faqs' => $faq,
        ]);
    }
}
