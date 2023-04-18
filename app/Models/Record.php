<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    const add = 1;
    const out = 2;

    protected $fillable = ["created_at", "concept", "type", "amount", "account_id", "subcategory_id", "id_tranfer"];

    //Relacion uno a muchos inversa
    public function account(){
        return $this->belongsTo(Account::class);
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
