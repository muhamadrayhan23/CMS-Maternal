<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LinkProduk extends Model
{
    protected $table = 'link_produk';
    protected $primaryKey = 'id_link_produk';

    protected $fillable = [
        'id_product',
        'link_name',
        'link_address',
        'link_image',
    ];

    /**
     * Relasi: Link Produk milik satu Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
