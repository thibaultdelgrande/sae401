<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class ImprintController extends AbstractController
{
    #[Route('/imprint', name: 'app_imprint')]
    public function index(TranslatorInterface $translator,Request $request): Response
    {
        $locale = $request->get('lang', $request->getLocale());
        $translator->setLocale($locale);
        return $this->render('imprint/index.html.twig', [
            'controller_name' => 'ImprintController',
        ]);
    }
}
