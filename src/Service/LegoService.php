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

    // Méthode pour récupérer un Lego
    public function getLego(): ?Lego
    {
        // Requête SQL pour récupérer un Lego
        $stmt = $this->pdo->query("SELECT * FROM lego LIMIT 1"); // Exemple, récupère un Lego
        $legoData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($legoData) {
            // Création d'un objet Lego à partir des données récupérées
            $lego = new Lego($legoData['id'], $legoData['name'], $legoData['collection']);
            $lego->setDescription($legoData['description']);
            $lego->setPrice($legoData['price']);
            $lego->setPieces($legoData['pieces']);
            $lego->setBoxImage($legoData['imagebox']);
            $lego->setLegoImage($legoData['imagebg']);

            return $lego; // Retourne l'objet Lego
        }

        return null; // Si aucun Lego trouvé
    }
}

?>