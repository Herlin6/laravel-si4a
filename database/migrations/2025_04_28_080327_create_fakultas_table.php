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
        Schema::create('fakultas', function (Blueprint $table) {
            $table->id(); // primary, auto increment, bigint
            $table->string('nama', 50); // varchar(50)
            $table->string('singkatan', 10); // varchar(10)
            $table->string('dekan', 50); // varchar(50)
            $table->string('wakil_dekan', 30); // varchar(30)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakultas');
    }
};
