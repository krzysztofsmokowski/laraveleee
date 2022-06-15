<?php

namespace App\DTOs\Cart;

class CartItemDTO
{
    private int $produktID;
    private string $name;
    private float $price;
    private int $amount;
    private ?string $image_path;

    /**
     * @return int
     */
    public function getProduktID(): int
    {
        return $this->produktID;
    }

    /**
     * @param int $produktID
     */
    public function setProduktID(int $produktID): void
    {
        $this->produktID = $produktID;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string|null
     */
    public function getImagePath(): ?string
    {
        return $this->image_path;
    }

    /**
     * @param string|null $image_path
     */
    public function setImagePath(?string $image_path): void
    {
        $this->image_path = $image_path;
    }

    public function IncrementAmount(): void
    {
        $this->amount += 1;
    }

}
