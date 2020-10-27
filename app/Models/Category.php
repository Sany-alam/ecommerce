<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subcategories()
    {
        return $this->hasMany('App\Models\Subcategory');
    }

    public function domain()
    {
        return $this->belongsTo('App\Models\Domain');
    }
}
