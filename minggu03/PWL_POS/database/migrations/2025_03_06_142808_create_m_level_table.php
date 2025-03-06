<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('m_level', function (Blueprint $table) {
            $table->id('level_id');
            $table->string('kode', 10);
            $table->string('nama_level', 100);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('m_level');
    }
};
