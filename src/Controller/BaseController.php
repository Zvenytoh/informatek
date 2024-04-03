<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BaseController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('base/home.html.twig', [
        ]);
    }
    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('base/about.html.twig', [

        ]);
    }
    #[Route('/choice', name: 'app_choice')]
    public function choice(): Response
    {
        return $this->render('base/choice.html.twig', [

        ]);
    }

    #[Route('/panier', name: 'app_panier')]
    public function panier(): Response
    {
        return $this->render('base/panier.html.twig', [

        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('base/contact.html.twig', [

        ]);
    }

    #[Route('/favori', name: 'app_favori')]
    public function favori(): Response
    {
        return $this->render('base/favori.html.twig', [

        ]);
    }
}
