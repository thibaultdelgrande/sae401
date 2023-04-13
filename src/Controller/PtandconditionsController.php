<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class PtandconditionsController extends AbstractController
{
    #[Route('/ptandconditions', name: 'app_ptandconditions')]
    public function index(TranslatorInterface $translator,Request $request): Response
    {
        $locale = $request->get('lang', $request->getLocale());
        $translator->setLocale($locale);
        return $this->render('ptandconditions/index.html.twig', [
            'controller_name' => 'PtandconditionsController',
        ]);
    }
}
