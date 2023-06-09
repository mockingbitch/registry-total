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
        Schema::create('tbl_xe', function (Blueprint $table) {
            $table->id();
            $table->string('giayChungNhan')->nullable();
            $table->string('bienSo')->nullable();
            $table->string('noiDangKy')->nullable();
            $table->string('hangSX')->nullable();
            $table->string('dongXe')->nullable();
            $table->string('mucDichSuDung')->nullable();
            $table->string('tenChuXe')->nullable();
            $table->string('trangThai')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
