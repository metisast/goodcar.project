<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeatures extends Model
{
    protected $table = 'products_features';

    protected $fillable = ['product_id', 'feature_id', 'title'];

}
