<?php

use App\Models\Account;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->enum("type", [Account::EFECTIVO, Account::CAJA_AHORRO])->default(Account::EFECTIVO);
            $table->unsignedBigInteger("coin_id");
            $table->foreign("coin_id")->references("id")->on("coins")->onDelete('cascade');
            $table->enum('status', [Account::ACTIVO, Account::INACTIVO])->default(Account::ACTIVO);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
