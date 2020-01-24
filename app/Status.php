<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'title',
    ];

    public function orders()
    {
        return $this->hasMany( Order::class);
    }
}
