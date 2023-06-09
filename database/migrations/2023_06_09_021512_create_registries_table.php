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
        Schema::create('tbl_dangkiem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('xe_id');
            $table->foreign('xe_id')->references('id')->on('tbl_xe');
            $table->string('maSoCap');
            $table->string('ngayCap');
            $table->string('ngayHetHan');
            $table->unsignedBigInteger('trungtam_id');
            $table->foreign('trungtam_id')->references('id')->on('tbl_trungtam');
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
        Schema::dropIfExists('registries');
    }
};
