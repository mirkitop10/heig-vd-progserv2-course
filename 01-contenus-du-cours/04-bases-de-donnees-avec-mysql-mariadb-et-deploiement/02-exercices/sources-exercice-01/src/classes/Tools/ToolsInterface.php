<?php

namespace Tools;

interface ToolsInterface {
    public function getId(): ?int;
    public function getToolName(): string;
    public function getType(): string;
    public function getPurchaseDate(): \DateTime;
    public function getPrice(): float;

    public function setId(int $id): void;
    public function setToolName(string $toolName): void;
    public function setType(string $type): void;
    public function setPurchaseDate(\DateTime $purchaseDate): void;
    public function setPrice(float $price): void;
}
