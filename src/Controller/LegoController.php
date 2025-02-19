<?php

// src/Controller/LegoController.php

namespace App\Controller;

use App\Service\LegoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegoController extends AbstractController
{
    #[Route('/', name: 'home')] // Route pour la page d'accueil
    public function home(LegoService $legoService): Response
    {
        // Appel à la méthode getAllLegos du service LegoService pour récupérer tous les Legos
        $legos = $legoService->getLegos();

        // Affichage de l'objet Legos dans la barre de débogage (utilise dump)
        dump($legos); // Cela va afficher le contenu de l'objet dans la barre de débogage Symfony

        // Rendu du template lego.html.twig avec l'objet Legos
        return $this->render('lego.html.twig', [
            'legos' => $legos
        ]);
    }

    #[Route('/{filter}', name: 'filter', requirements: ['filter' => 'creator|star_wars|creator_expert'])] // Route pour les filtres spécifiques
    public function filter(LegoService $legoService, string $filter): Response
    {
        // Transformation du nom de la collection reçue en paramètre avec le bon format
        $collectionName = str_replace('_', ' ', $filter);
        $collectionName = ucwords($collectionName);

        // Appel à la méthode getLegosByCollection du service LegoService pour récupérer les Legos de la collection spécifiée
        $legos = $legoService->getLegosByCollection($collectionName);

        // Affichage de l'objet Legos dans la barre de débogage (utilise dump)
        dump($legos); // Cela va afficher le contenu de l'objet dans la barre de débogage Symfony

        // Rendu du template filter.html.twig avec l'objet Legos
        return $this->render('lego.html.twig', [
            'legos' => $legos,
         
        ]);
    }
}

?>
