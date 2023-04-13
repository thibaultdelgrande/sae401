<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FaqRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class FaqController extends AbstractController
{
    #[Route('/faq', name: 'app_faq')]
    public function index(FaqRepository $faqRepository,TranslatorInterface $translator,Request $request): Response
    {
        $locale = $request->get('lang', $request->getLocale());
        $translator->setLocale($locale);
        $faq=$faqRepository->findAll();
        return $this->render('faq/index.html.twig', [
            'controller_name' => 'FaqController',
            'faqs' => $faq,
        ]);
    }
}
