<?php

namespace App\ValueObjects;

use App\Models\Produkt;
use App\ValueObjects\CartItem;
use Illuminate\Support\Collection;

class Cart
{
    private Collection $items;

    /**
     * @param Collection $items
     */
    public function __construct(Collection $items = null)
    {
        $this->items = $items ?? Collection::empty();
    }

    /**
     * @return Collection
     */
    public function getItems(): Collection
    {
        return $this->items;
    }
public function getSum(): float{
        return $this->items->sum(function($item){
            return $item->getSum();
        });
}

public function removeItem(Produkt $produkt):Cart{
        $items = $this->items->reject(function ($item)use ($produkt){
                return $produkt->id == $item->getProduktID();
            }
            );
        return new Cart($items);
}
    public function addItem(Produkt $produkt): Cart{
        $items = $this->items;
        $item = $items->first(function($item) use ($produkt){
           return $produkt->id ==$item->getProduktID();
        });
        if (!is_null($item)){
            $items = $items->reject(function ($item)use ($produkt){
                return $produkt->id == $item->getProduktID();
                $newitem = $item->addAmmount($produkt);
            });

        }else {
            $newitem = new CartItem($produkt);
}
        $items->add($newitem);
        return new Cart($items);
    }
}

