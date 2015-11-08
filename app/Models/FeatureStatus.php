<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureStatus extends Model
{
    protected $table = 'features_status';

    protected $fillable = ['catalog_id', 'feature_id'];
}
