<?php

namespace App\Controller;

use App\Entity\LegoCollection;
use App\Repository\LegoCollectionRepository;
use App\Repository\LegoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegoController extends AbstractController
{
    #[Route('/', name: 'home')] // Route pour la page d'accueil
    public function home(LegoRepository $legoRepository, LegoCollectionRepository $legoCollectionRepository): Response
    {
        // Récupérer toutes les collections
        $collections = $legoCollectionRepository->findAll();

        // Appel à la méthode getAllLegos pour récupérer tous les Legos
        $legos = $legoRepository->findAll();

        // Rendu du template lego.html.twig avec l'objet Legos et collections
        return $this->render('lego.html.twig', [
            'legos' => $legos,
            'collections' => $collections, // Passer les collections au template pour le menu dynamique
            'collection' => null, // Passer null pour la variable collection
        ]);
    }

    #[Route('/collections/{id}', name: 'collection_show')]
    public function show(LegoCollection $collection, LegoRepository $legoRepository, LegoCollectionRepository $legoCollectionRepository): Response
    {
        // Récupérer les Legos associés à la collection
        $collections = $legoCollectionRepository->findAll();
        $legos= $legoRepository->findBy(['collection' => $collection]);

        return $this->render('lego.html.twig', [
           'collection' => $collection, // Passer la collection actuelle
            'legos' => $legos,
            'collections' => $collections, // Passer la collection actuelle
        ]);
    }
}
?>