<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberCategory extends Model
{

    protected $table = 'member_categories';
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];

    public function member(){
        return $this->hasMany(Member::class, 'member_category_id', 'id');
    }

}
