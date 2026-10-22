<?php

namespace Tools;

require_once __DIR__ . '/../../utils/autoloader.php';

use Database;

class ToolsManager implements ToolsManagerInterface {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getTool(): array {
        // Définition de la requête SQL pour récupérer tous les utilisateurs
        $sql = "SELECT * FROM tools";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Exécution de la requête SQL
        $stmt->execute();

        // Récupération de tous les utilisateurs
        $tools = $stmt->fetchAll();

        // Transformation des tableaux associatifs en objets User
        $tools = array_map(function ($toolData) {
            return new Tool(
                $toolData['id'],
                $toolData['tool_name'],
                $toolData['type'],
                new \DateTime($toolData['purchase_date']),
                $toolData['price']
            );
        }, $tools);

        // Retour de tous les utilisateurs
        return $tools;
    }

    public function addTool(Tool $tools): int {
        // Définition de la requête SQL pour ajouter un utilisateur
        $sql = "INSERT INTO tools (
            tool_name,
            type,
            purchase_date,
            price
        ) VALUES (
            :tool_name,
            :type,
            :purchase_date,
            :price
        )";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Lien avec les paramètres
        $stmt->bindValue(':tool_name', $tools->getToolName());
        $stmt->bindValue(':type', $tools->getType());
        $stmt->bindValue(':purchase_date', $tools->getPurchaseDate()->format('Y-m-d'));
        $stmt->bindValue(':price', $tools->getPrice());

        // Exécution de la requête SQL pour ajouter un utilisateur
        $stmt->execute();

        // Récupération de l'identifiant de l'utilisateur ajouté
        $userId = $this->database->getPdo()->lastInsertId();

        // Retour de l'identifiant de l'utilisateur ajouté.
        return $userId;
    }

    public function removeTool(int $id): bool {
        // Définition de la requête SQL pour supprimer un utilisateur
        $sql = "DELETE FROM tools WHERE id = :id";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Lien avec le paramètre
        $stmt->bindValue(':id', $id);

        // Exécution de la requête SQL pour supprimer un utilisateur
        return $stmt->execute();
    }
}
