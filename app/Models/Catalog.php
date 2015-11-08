<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['title'];

    public function products()
    {
        return $this->hasMany('Product');
    }

    public  function features()
    {
        return $this->belongsToMany('App\Models\Feature', 'catalogs_features');
    }
}
