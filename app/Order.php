<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'user_id',
        'status_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'sum',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
