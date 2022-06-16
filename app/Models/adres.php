<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class adres extends Model
{
    use HasFactory;
    protected $fillable =[
        'miasto',
        'ulica',
        'numer_ulicy',
        'numer_domu',
        'kod_pocztowy',
        'user_id'
    ];
    public function User(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
