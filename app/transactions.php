<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transactions extends Model
{
    protected $table = 'transactions';
    use SoftDeletes;

    protected $fillable = [
        'trx_number ',
        'member_id',
        'product_id',
        'quantity',
        'discount',
        'total'
    ];

    public function product()
        {
            return $this->hasMany(Product::class, 'id', 'product_id');
        }

    public function member()
        {
            return $this->hasMany(Member::class, 'id', 'id');
        }
}

