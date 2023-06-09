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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tinhThanh')->nullable();
            $table->string('thuongTru')->nullable();
            $table->string('cccd')->nullable();
            $table->unsignedBigInteger('trungtam_id');
            $table->foreign('trungtam_id')->references('id')->on('tbl_trungtam');
            $table->string('role')->default('guest');
            $table->integer('trangThai');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
