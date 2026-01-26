<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProdukDetail;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';
    protected $primaryKey = 'id_product';

    protected $fillable = [
        'product_name',
        'price',
        'link',
        'created_by',
        'updated_by',
        'deleted_by',
        'desc',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function details()
    {
        return $this->hasMany(ProdukDetail::class, 'id_product', 'id_product');
    }
}
