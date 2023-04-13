<?php

namespace App\Controller;

use App\Form\FaqType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Faq;

class CreateFaqController extends AbstractController
{
    #[Route('/faq/create', name: 'app_faq_create', methods: ['GET', 'POST'])]
    public function index( Request $request, EntityManagerInterface $manager): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_backoffice_login');
        }

        $faq = New Faq();
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
            'controller_name' => 'EditionFaqController',
            'faq' => $faq,
            'form' => $form->createView(),
        ]);

    }
}
