<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory');
    }

    public function detail_images()
    {
        return $this->hasMany('App\Models\Detail_image');
    }

}
