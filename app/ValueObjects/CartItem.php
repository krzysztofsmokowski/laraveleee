<?php

namespace App\ValueObjects;

use App\Models\Produkt;

class CartItem
{
    private int $produktID;
    private string $name;
    private float $price;
    private int $amount =0;
    private ?string $image_path;

    /**
     * @param int $produkt
     * @param int $amount
     */
    public function __construct(Produkt $produkt, int $amount = 1)
    {
        $this->produktID = $produkt->id;
        $this->name = $produkt->name;
        $this->price = $produkt->price;
        $this->amount = $produkt->amount;
        $this->image_path = $produkt->image_path;
    }


    /**
     * @return int
     */
    public function getProduktID(): int
    {
        return $this->produktID;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
public function getSum(): float{
        return $this->price * $this->amount;
}

    /**
     * @return string|null
     */
    public function getImagePath(): ?string
    {
        return $this->image_path;
    }
public function addAmmount(Produkt $produkt):CartItem{
            return new CartItem($produkt, ++$this->amount);
}
}
