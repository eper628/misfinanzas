<?php

namespace Database\Seeders;

use App\Models\Coin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coin1 = new Coin();
        $coin1->name = "ARS";
        $coin1->save();
        
        $coin2 = new Coin();
        $coin2->name = "USD";
        $coin2->save();
    }
}
