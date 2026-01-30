<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'kategori',
    ];

    protected $casts = [
        'harga' => 'integer',
        'stok' => 'integer',
    ];

    /**
     * Get formatted price
     */
    public function getFormattedHargaAttribute(): string
    {
        return 'Rp '.number_format($this->harga, 0, ',', '.');
    }

    /**
     * Check if product is in stock
     */
    public function isInStock(): bool
    {
        return $this->stok > 0;
    }

    /**
     * Check if stock is low
     */
    public function isLowStock(): bool
    {
        return $this->stok > 0 && $this->stok <= 10;
    }

    /**
     * Check if product is new (created within last 30 days)
     */
    public function isNew(): bool
    {
        return $this->created_at->gt(now()->subDays(30));
    }

    /**
     * Scope for filtering by category
     */
    public function scopeByKategori($query, $kategori)
    {
        if ($kategori) {
            return $query->where('kategori', $kategori);
        }

        return $query;
    }

    /**
     * Scope for search
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('nama_produk', 'like', "%{$search}%")
                ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        return $query;
    }
}
