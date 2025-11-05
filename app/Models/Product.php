<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'sku',
        'image',
        'active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'active' => 'boolean',
    ];

    // Relación: un producto tiene muchas compras
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    // Relación: un producto tiene muchas ventas
    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
