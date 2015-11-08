<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['title', 'status_id'];

    public function getFeatures($id, $catalog)
    {
        $fId = $catalog->find($id)->features;

        //dd($fId[0]->id);
        $mass = [];
        foreach($fId as $f)
        {
            $mass[] = $f->id;
        }
        //dd($mass);

        $feature = Feature::whereNotIn('id', $mass)->get();

        return $feature;
    }

}
