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
        Schema::create('resume_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resume_id')->nullable();
            $table->text('text')->nullable();
            $table->timestamps();

            $table->foreign('resume_id')->references('id')->on('resumes')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('resume_works');
        Schema::enableForeignKeyConstraints();
    }
};
