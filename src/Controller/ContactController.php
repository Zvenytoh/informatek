<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ContactRepository;

class ContactController extends AbstractController
{
    #[Route('//private-liste-contacts', name: 'app_liste_contacts')]
    public function listeContacts(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();
        return $this->render('contact/liste-contacts.html.twig', [
            'contacts' => $contacts
        ]);
    }
}