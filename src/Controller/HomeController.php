<?php

namespace App\Controller;

use App\Entity\Attestation;
use App\Form\FormationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/drissa", name="app_home")
     */
    public function index(): Response
    {
        $attestion = new Attestation();
        $form = $this->createForm(FormationType::class, $attestion);

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
