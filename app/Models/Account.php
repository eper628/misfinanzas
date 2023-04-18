<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    const EFECTIVO = 1;
    const CAJA_AHORRO = 2;
    const ACTIVO = 3;
    const INACTIVO = 4;
    

    protected $fillable = ["name", "slug", "type", "coin_id", "status"];

    //Relacion uno a muchos inversa
    public function coin(){
        return $this->belongsTo(Coin::class);
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
