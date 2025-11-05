<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Purchase extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'price',
        'total',
        'supplier',
        'purchase_date'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'total' => 'decimal:2',
        'purchase_date' => 'date',
    ];

    // Relación: una compra pertenece a un producto
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Relación: una compra pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
