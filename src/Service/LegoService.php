<?php

// src/Service/LegoService.php

namespace App\Service;

use App\Entity\Lego;
use \PDO;

class LegoService
{
    private $pdo;

    // Constructeur qui initialise la connexion PDO
    public function __construct()
    {
        // Connection PDO à la base de données MySQL
        $this->pdo = new PDO('mysql:host=tp-symfony-mysql;dbname=lego_store', 'root', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Méthode pour récupérer tous les Legos
    public function getLegos(): array
    {
        // Requête SQL pour récupérer tous les Legos
        $stmt = $this->pdo->query("SELECT * FROM lego"); // Exemple, récupère tous les Legos
        $legosData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $legos = [];
        foreach ($legosData as $legoData) {
            // Création d'un objet Lego à partir des données récupérées
            $lego = new Lego($legoData['id'], $legoData['name'], $legoData['collection']);
            $lego->setDescription($legoData['description']);
            $lego->setPrice($legoData['price']);
            $lego->setPieces($legoData['pieces']);
            $lego->setBoxImage($legoData['imagebox']);
            $lego->setLegoImage($legoData['imagebg']);

            $legos[] = $lego; // Ajoute l'objet Lego au tableau
        }

        return $legos; // Retourne le tableau d'objets Lego
    }

    // Méthode pour récupérer les Legos par collection
    public function getLegosByCollection(string $collection): array
    {
        // Requête SQL pour récupérer les Legos par collection
        $stmt = $this->pdo->prepare("SELECT * FROM lego WHERE collection = :collection");
        $stmt->execute(['collection' => $collection]);
        $legosData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $legos = [];
        foreach ($legosData as $legoData) {
            // Création d'un objet Lego à partir des données récupérées
            $lego = new Lego($legoData['id'], $legoData['name'], $legoData['collection']);
            $lego->setDescription($legoData['description']);
            $lego->setPrice($legoData['price']);
            $lego->setPieces($legoData['pieces']);
            $lego->setBoxImage($legoData['imagebox']);
            $lego->setLegoImage($legoData['imagebg']);

            $legos[] = $lego; // Ajoute l'objet Lego au tableau
        }

        return $legos; // Retourne le tableau d'objets Lego
    }
}

?>