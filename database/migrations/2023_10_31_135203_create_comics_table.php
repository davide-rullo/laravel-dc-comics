<?php

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
        Schema::create('comics', function (Blueprint $table) {
            $table->id();

            $table->string('title', 50);
            $table->string('description', 200);
            $table->string('thumb', 250);
            $table->tinyText('price');
            $table->string('series', 250);
            $table->date('sale_date');
            $table->string('type', 50);
            $table->text('artists', 250);
            $table->text('writers', 250);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
