<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('access', function (Blueprint $table) 
        {
            $table->id();
            $table->string('token', 128)->unique()->nullable();
            $table->string('url', 64)->unique()->nullable();
            $table->dateTime('valid_until')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('access');
        Schema::enableForeignKeyConstraints();
    }
};
