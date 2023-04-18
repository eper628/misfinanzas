<?php

use App\Models\Record;
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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->date('created_at');
            $table->string('concept');
            $table->enum('type', [Record::add, Record::out])->default(Record::add);
            $table->float('amount');
            $table->unsignedBigInteger("account_id");
            $table->foreign("account_id")->references("id")->on("accounts")->onDelete('cascade');
            $table->unsignedBigInteger("subcategory_id");
            $table->foreign("subcategory_id")->references("id")->on("subcategories")->onDelete('cascade');
            $table->integer('id_transfer')->nullable();
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
