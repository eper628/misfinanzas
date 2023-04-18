<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ["name", "slug", "category_id"];
    
    //Relacion uno a muchos inversa
    public function category(){
    return $this->belongsTo(Category::class);
    }

    public function record(){
        return $this->hasMany(Record::class);
    }

    //URL AMIGABLES
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
