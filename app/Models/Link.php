<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{

    use SoftDeletes;

    protected $table = 'link';
    protected $primaryKey = 'id_link';

    protected $fillable = [
        'link_name',
        'link_address',
        'created_by',
        'updated_by',
        'deleted_by',
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
}
