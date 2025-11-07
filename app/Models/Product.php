<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'discount_price',
        'developer',
        'publisher',
        'release_date',
        'cover_image',
        'gallery_images',
        'stock',
        'age_rating',
        'is_digital',
        'is_featured',
        'is_active',
        'category_id',
        'platform_id'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'release_date' => 'date',
        'gallery_images' => 'array',
        'is_digital' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    // RELACIONES PRINCIPALES
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function platform(): BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }

    // RELACIONES DE COMPRAS Y VENTAS
    public function purchaseItems(): HasMany
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function saleItems(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }

    // RELACIONES DE USUARIOS
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    // MÉTODOS ÚTILES
    public function getFinalPriceAttribute()
    {
        return $this->discount_price ?? $this->price;
    }

    public function hasStock(): bool
    {
        return $this->stock > 0;
    }
}
