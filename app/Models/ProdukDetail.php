<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukDetail extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
    'image_product',
    'desc', 
    ];


    public function product()
    {
    return $this->belongsTo(Product::class, 'product_id', 'id_product');
    }

}
