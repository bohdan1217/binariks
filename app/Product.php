<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'alias',
        'content',
        'price',
    ];

    /**
     * Пошук товарів по заголовку або alias
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $q
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeQ($query, string $q) {
        return $query->where(function (Builder $query) use ($q) {
            $term = "%$q%";
            return $query->orWhere('title', 'like', $term)
                ->orWhere('alias', 'like', $term);
        });
    }
    /**
     * Тільки ті товари які мають ціну
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param bool $has
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHasPrice($query, bool $has = true) {
        if ($has) {
            return $query->whereNotNull('price');
        } else {
            return $query->whereNull('price');
        }
    }

    /**
     * Тільки ті товари які не мають ціну
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHasNotPrice($query) {
        return $query->hasPrice(false);
    }




}
