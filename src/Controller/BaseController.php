<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ChercherType;


class BaseController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ChercherType::class);
        if ($request->isMethod('POST')) {
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $mot = $form->get('chercher')->getData();
            return $this->redirectToRoute('app_search', ['mot'=> $mot]);
        }
        }
        return $this->render('base/home.html.twig', [

       'form'=> $form->createView(),
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
    public function contact(Request $request, EntityManagerInterface $em): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $contact->setDateEnvoi(new \Datetime());
                $em->persist($contact);
                $em->flush();

                $this->addFlash('notice', 'Message envoyé');
                return $this->redirectToRoute('app_contact');

            }
        }
        return $this->render('base/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/favori', name: 'app_favori')]
    public function favori(): Response
    {
        return $this->render('base/favori.html.twig', [

        ]);
    }
    #[Route('/search/{mot}', name: 'app_search')]

    public function search(Request $request, EntityManagerInterface $em): Response
    {
        $mot = $request->get('mot');
        return $this->render('base/search.html.twig', [
            'mot'=> $mot,
        ]);
    }
}
