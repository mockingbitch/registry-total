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
            $table->string('giayChungNhan');
            $table->string('bienSo');
            $table->string('noiDangKy');
            $table->string('hangSX')->nullable();
            $table->string('dongXe')->nullable();
            $table->string('mucDichSuDung');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('trangThai');
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
