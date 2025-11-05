<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'price',
        'total',
        'customer_name',
        'customer_email',
        'sale_date',
        'status'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'total' => 'decimal:2',
        'sale_date' => 'date',
    ];

    // Relación: una venta pertenece a un producto
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Relación: una venta pertenece a un usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
