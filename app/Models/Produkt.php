<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produkt extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_path',
        'name',
        'description',
        'price',
        'amount',
    ];
    public function zamowienia():BelongsToMany{
        return $this->belongsToMany(zamowienia::class);
    }
}
