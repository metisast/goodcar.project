<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'catalog_id', 'date_store', 'price', 'old_price', 'author', 'main_image', 'views', 'buy_counts','status_id'];

    public function catalog()
    {
        return $this->belongsTo('App\Models\Catalog');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\ProductsStatus');
    }
}

