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
        // Appel à la méthode getLego du service LegoService pour récupérer un Lego
        $lego = $legoService->getLego();

        // Affichage de l'objet Lego dans la barre de débogage (utilise dump)
        dump($lego); // Cela va afficher le contenu de l'objet dans la barre de débogage Symfony

        // Rendu du template lego.html.twig avec l'objet Lego
        return $this->render('lego.html.twig', [
            'lego' => $lego
        ]);
    }
}


?>