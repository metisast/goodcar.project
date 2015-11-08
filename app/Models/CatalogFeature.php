<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogFeature extends Model
{
    protected $table = 'catalogs_features';

    protected $fillable = ['catalog_id', 'feature_id'];
}
