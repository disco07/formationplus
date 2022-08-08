<?php

namespace App\Controller;

use App\Entity\Attestation;
use App\Form\FormationType;
use App\Repository\AttestationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/drissa", name="app_home")
     */
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $attestion = new Attestation();
        $form = $this->createForm(FormationType::class, $attestion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $attestion = $form->getData();
            $entityManager->persist($attestion);
            $entityManager->flush();
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
