<?php

namespace App\Controller;

use App\Repository\FaqRepository;
use App\Form\FaqType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FaqEditController extends AbstractController
{
    #[Route('/faq/{id}/edit', name: 'app_faq_edit')]
    public function index(FaqRepository $faqRepository, $id, Request $request,EntityManagerInterface $manager): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_backoffice_login');
        }

        $faq = $faqRepository->findOneBy(['id' => $id]);

        $form = $this->createForm(FaqType::class, $faq);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid())
        {
            $faq = $form->getData();

            $manager->persist($faq);
            $manager->flush();

            return $this->redirectToRoute('app_admin_pannel');  
        }

        return $this->render('faq_edit/index.html.twig', [
            'controller_name' => 'FaqEditController',
            'faq' => $faq,
            'form' => $form->createView(),
        ]);
    }
}
