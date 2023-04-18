<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const add = 1;
    const out = 2;
    const transfer = 3;
    const setting = 4;
    

    protected $fillable = ["name", "slug", "type"];

    //URL AMIGABLES
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
