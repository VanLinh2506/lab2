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
        Schema::create('tin', function (Blueprint $table) {
        $table->id();
        $table->string('tieuDe');
        $table->text('tomTat')->nullable();
        $table->text('noiDung')->nullable();
        $table->integer('xem')->default(0);
        $table->date('ngayDang')->nullable();
        $table->integer('idLT');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin');
    }
};
