<?php

namespace App\DTOs\Cart;

class CartDTO
{
    private array $items = [];
    private float $totalSum = 0;
    private int $totalAmount= 0;

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return float|int
     */
    public function getTotalSum(): float|int
    {
        return $this->totalSum;
    }

    /**
     * @param float|int $totalSum
     */
    public function setTotalSum(float|int $totalSum): void
    {
        $this->totalSum = $totalSum;
    }

    /**
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->totalAmount;
    }

    /**
     * @param int $totalAmount
     */
    public function setTotalAmount(int $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }
    public function IncrementTotalAmount(): void
    {
        $this->totalAmount += 1;
    }
    public function IncrementTotalSum(float $price): void
    {
        $this->totalSum += $price;
    }
}
