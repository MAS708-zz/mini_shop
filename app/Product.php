<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    protected $table = 'products';
    use SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'image',
        'product_category_id',
        'desc',

    ];
            public function category()
            {
               return $this->belongsTo(Categories::class, 'product_category_id', 'id');
            }
}
