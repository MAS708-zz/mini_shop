<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    protected $table = 'members';
    use SoftDeletes;
    protected $fillable = [
        'member_category_id',
        'full_name',
        'dob',
        'address',
        'gender',
        'barcode'
    ];

    public function category()
    {

        return $this->belongsTo(MemberCategory::class, 'member_category_id', 'id');

    }

    public function transaction()
            {
                return $this->belongsTo(transactions::class, 'member_id', 'id');
            }

}
