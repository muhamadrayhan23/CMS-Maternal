<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukDetail extends Model
{
    protected $table = 'produk_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_product',
        'image_name',
        'image_product',
        'atribute_name',
        'atribute_value',
        'desc',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
