<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SmartphoneController extends AbstractController
{
    #[Route('/tel_android', name: 'app_tel_android')]
    public function android(): Response
    {
        return $this->render('smartphone/tel_android.html.twig', [
        ]);
    }

    #[Route('/tel_iphone', name: 'app_tel_iphone')]
    public function iphone(): Response
    {
        return $this->render('smartphone/tel_iphone.html.twig', [
        ]);
    }

    #[Route('/tel_phone', name: 'app_tel_phone')]
    public function phone(): Response
    {
        return $this->render('smartphone/tel_phone.html.twig', [
        ]);
    }

    #[Route('/tel_renew', name: 'app_tel_renew')]
    public function renew(): Response
    {
        return $this->render('smartphone/tel_renew.html.twig', [
        ]);
    }

    #[Route('/tel_apple', name: 'app_tel_apple')]
    public function apple(): Response
    {
        return $this->render('smartphone/tel_apple.html.twig', [
        ]);
    }

    #[Route('/tel_samsung', name: 'app_tel_samsung')]
    public function samsung(): Response
    {
        return $this->render('smartphone/tel_samsung.html.twig', [
        ]);
    }

    #[Route('/tel_google', name: 'app_tel_google')]
    public function google(): Response
    {
        return $this->render('smartphone/tel_google.html.twig', [
        ]);
    }

    #[Route('/tel_xiaomi', name: 'app_tel_xiaomi')]
    public function xiaomi(): Response
    {
        return $this->render('smartphone/tel_xiaomi.html.twig', [
        ]);
    }

    #[Route('/tel_oneplus', name: 'app_tel_oneplus')]
    public function oneplus(): Response
    {
        return $this->render('smartphone/tel_oneplus.html.twig', [
        ]);
    }
}
