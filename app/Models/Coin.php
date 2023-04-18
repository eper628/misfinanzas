<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relacion uno a muchos
    public function account(){
        return $this->hasMany(Account::class);
    }

}
