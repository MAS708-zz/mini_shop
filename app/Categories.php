<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    protected $table = 'product_categories';
    use SoftDeletes;
    protected $fillable = [
        'name',
        'desc',
    ];

    public function product()
    {
        return $this->hasMany(Product::class,'product_category_id','id');
    }
}
