<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\AjoutProduitType;
use App\Form\AjoutTypeProduitType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ProduitType;
use App\Repository\ProduitRepository;
use App\Entity\User;

class ProduitController extends AbstractController
{
    #[Route('/add-produit', name: 'app_add_produit')]
    public function addProduit(Request $request, EntityManagerInterface $em): Response
    {
        $produit = new Produit();
        $form = $this->createForm(AjoutProduitType::class, $produit);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($produit);
                $em->flush();
                $this->addFlash('notice','Type de Produit ajouté');
                return $this->redirectToRoute('app_add_produit_type');
            }
            }
        return $this->render('produit/add-produit-type.html.twig', [
            'form'=> $form->createView(),
        ]);
    }

    #[Route('/remove-produit', name: 'app_remove_produit')]
    public function removeProduit(): Response
    {
        return $this->render('produit/remove-produit.html.twig', [
        ]);
    }

    #[Route('/edit-produit', name: 'app_edit_produit')]
    public function editProduit(): Response
    {
        return $this->render('produit/edit-produit.html.twig', [
        ]);
    }

    #[Route('/add-produit-type', name: 'app_add_produit_type')]
    public function addProduitType(Request $request, EntityManagerInterface $em): Response
    {
        $produitType = new ProduitType();
        $form = $this->createForm(AjoutTypeProduitType::class, $produitType);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($produitType);
                $em->flush();
                $this->addFlash('notice','Type de Produit ajouté');
                return $this->redirectToRoute('app_add_produit_type');
            }
            }
        return $this->render('produit/add-produit-type.html.twig', [
            'form'=> $form->createView(),
        ]);
    }

    #[Route('/produit{id}', name: 'app_produit')]
    public function produit(int $id, ProduitRepository $produitRepository): Response
    {
        $produit = $produitRepository->find($id);
        return $this->render('produit/produit.html.twig', [
            'produit' => $produit,
        ]);
    }
    #[Route('/private-favoris-produit/{id}', name: 'app_favoris_produit')]
    public function favoris(Produit $produit,EntityManagerInterface $em,Request $request): Response
    {
       if ($this->getUser()->getProduitsAdorer()->contains($produit)) {
        $this->getUser()->removeProduitsAdorer($produit);
       } else {
        $this->getUser()->addProduitsAdorer($produit);
       }
       $em->persist($this->getUser());
       $em->flush();
       $referer = $request->headers->get('referer');
       return $this->redirect($referer);
    }

    #[Route('/private-suppfavoris/{id}', name: 'app_suppfav')]
    public function suppfav(Produit $produit,EntityManagerInterface $em,Request $request): Response
    {
        if ($this->getUser()->getfavoris()->contains($produit)) {
            $this->getUser()->removeFavori($produit);
        }
        $em->persist($this->getUser());
        $em->flush();
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }

}
