<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SmartphoneController extends AbstractController
{
    #[Route('/tel_android', name: 'app_tel_android')]
    public function android(ProduitRepository $produitRepository): Response
    {
        $telephones = $produitRepository->findAll();
        return $this->render('smartphone/tel_android.html.twig', [
            'telephones'=> $telephones
        ]);
    }

    #[Route('/tel_iphone', name: 'app_tel_iphone')]
    public function iphone(ProduitRepository $produitRepository): Response
    {
        $telephones = $produitRepository->findAll();
        return $this->render('smartphone/tel_iphone.html.twig', [
            'telephones'=> $telephones
        ]);
    }

    #[Route('/tel_phone', name: 'app_tel_phone')]
    public function phone(ProduitRepository $produitRepository): Response
    {
        $telephones = $produitRepository->findAll();
        return $this->render('smartphone/tel_phone.html.twig', [
            'telephones'=> $telephones
        ]);
    }

    #[Route('/tel_renew', name: 'app_tel_renew')]
    public function renew(ProduitRepository $produitRepository): Response
    {
        
        $telephones = $produitRepository->findAll();
        return $this->render('smartphone/tel_renew.html.twig', [
            'telephones'=> $telephones
        ]);
    }

    #[Route('/tel_apple', name: 'app_tel_apple')]
    public function apple(ProduitRepository $produitRepository): Response
    {
        
        $telephones = $produitRepository->findAll();
        return $this->render('smartphone/tel_apple.html.twig', [
            'telephones'=> $telephones
        ]);
    }

    #[Route('/tel_samsung', name: 'app_tel_samsung')]
    public function samsung(ProduitRepository $produitRepository): Response
    {
        
        $telephones = $produitRepository->findAll();
        return $this->render('smartphone/tel_samsung.html.twig', [
            'telephones'=> $telephones
        ]);
    }

    #[Route('/tel_google', name: 'app_tel_google')]
    public function google(ProduitRepository $produitRepository): Response
    {
        
        $telephones = $produitRepository->findAll();
        return $this->render('smartphone/tel_google.html.twig', [
            'telephones'=> $telephones
        ]);
    }

    #[Route('/tel_xiaomi', name: 'app_tel_xiaomi')]
    public function xiaomi(ProduitRepository $produitRepository): Response
    {
        
        $telephones = $produitRepository->findAll();
        return $this->render('smartphone/tel_xiaomi.html.twig', [
            'telephones'=> $telephones
        ]);
    }

    #[Route('/tel_oneplus', name: 'app_tel_oneplus')]
    public function oneplus(ProduitRepository $produitRepository): Response
    {
        
        $telephones = $produitRepository->findAll();
        return $this->render('smartphone/tel_oneplus.html.twig', [
            'telephones'=> $telephones
        ]);
    }
}
