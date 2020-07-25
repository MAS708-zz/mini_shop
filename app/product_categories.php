<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_categories extends Model
{
    protected $table = 'product_categories';
    use SoftDeletes;
    protected $fillable = [
        'name',
        'desc',
    ];

    public function Product(){
        return $this->belongsTo(Product::class, 'product_category_id', 'id');
    }
}
