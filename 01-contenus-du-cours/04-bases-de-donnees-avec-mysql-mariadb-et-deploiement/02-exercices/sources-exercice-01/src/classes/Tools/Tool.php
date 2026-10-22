<?php

namespace Tools;

use DateTime;
use Tools\ToolsInterface;

class Tool implements ToolsInterface {
    // Propriétés privées pour assurer l'encapsulation

    private ?int $id;
    private string $toolName;
    private string $type;
    private \DateTime $purchaseDate;
    private float $price;

    const TYPES = [
        'spade' => 'Bêche',
        'rake' => 'Râteau',
        'mower' => 'Tondeuse'
    ];


    // Constructeur pour initialiser l'objet
    public function __construct(?int $id, string $toolName, string $type, \DateTime $purchaseDate, float $price) {
        // Vérification des données
        if (empty($toolName)) {
            throw new \InvalidArgumentException("Le nom est requis.");
        } else if (strlen($toolName) < 2) {
            throw new \InvalidArgumentException("Le nom doit contenir au moins 2 caractères.");
        }

        if (empty($type)) {
            throw new \InvalidArgumentException("Le type est requis.");
        } else if (!array_key_exists($type, self::TYPES)) {
            throw new \InvalidArgumentException("Le type choisi n'est pas valide");
        }

        if (empty($purchaseDate)) {
            throw new \InvalidArgumentException("La date d'achat est requise.");
        } elseif (!$purchaseDate instanceof \DateTime) {
            throw new \InvalidArgumentException("La date d'achat doit être au format AAAA-MM-JJ.");
        }

        if ($price < 0) {
            throw new \InvalidArgumentException("Le prix doit être un nombre positif.");
        }

        // Initialisation des propriétés
        $this->id = $id;
        $this->toolName = $toolName;
        $this->type = $type;
        $this->purchaseDate = $purchaseDate;
        $this->price = $price;
    }

    // Getters pour accéder aux propriétés
    public function getId(): ?int {
        return $this->id;
    }

    public function getToolName(): string {
        return $this->toolName;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getPurchaseDate(): \DateTime {
        return $this->purchaseDate;
    }

    public function getPrice(): float {
        return $this->price;
    }

    // Setters pour modifier les propriétés
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setToolName(string $toolName): void {
        $this->toolName = $toolName;
    }

    public function setType(string $type): void {
        $this->type = $type;
    }

    public function setPurchaseDate(\DateTime $purchaseDate): void {
        $this->purchaseDate = $purchaseDate;
    }

    public function setPrice(float $price): void {
        if ($price >= 0) {
            $this->price = $price;
        }
    }
}
