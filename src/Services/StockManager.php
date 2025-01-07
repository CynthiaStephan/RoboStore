<?php

namespace App\Services;

use App\Entity\Robot;

class StockManager
{
    private array $stock = [];

    public function setStock(Robot $robot, int $quantity): void
    {
        $this->stock[$robot->getId()] = $quantity;
    }

    public function getStock(Robot $robot): int
    {
        return $this->stock[$robot->getId()] ?? 0;
    }

    public function canProcessOrder(Robot $robot, int $quantity): bool
    {
        $currentStock = $this->getStock($robot);
        return $currentStock >= $quantity;
    }

    public function processOrder(Robot $robot, int $quantity): void
    {
        if (!$this->canProcessOrder($robot, $quantity)) {
            throw new \RuntimeException('Insufficient stock');
        }

        $this->stock[$robot->getId()] -= $quantity;
    }
}