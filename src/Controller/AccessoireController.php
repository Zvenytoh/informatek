<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccessoireController extends AbstractController
{
    #[Route('/coque', name: 'app_coque')]
    public function coque(): Response
    {
        return $this->render('accessoire/coque.html.twig', [
        ]);
    }

    #[Route('/cable', name: 'app_cable')]
    public function cable(): Response
    {
        return $this->render('accessoire/cable.html.twig', [
        ]);
    }

    #[Route('/headset', name: 'app_headset')]
    public function casque(): Response
    {
        return $this->render('accessoire/headset.html.twig', [
        ]);
    }

    #[Route('/support', name: 'app_support')]
    public function support(): Response
    {
        return $this->render('accessoire/support.html.twig', [
        ]);
    }

    #[Route('/other', name: 'app_other')]
    public function autre(): Response
    {
        return $this->render('accessoire/other.html.twig', [
        ]);
    }
}
