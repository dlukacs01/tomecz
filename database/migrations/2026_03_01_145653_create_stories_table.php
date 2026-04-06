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
        Schema::create('stories', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('title_en');
            $table->string('slug');
            $table->string('intro');
            $table->string('intro_en');
            $table->text('body');
            $table->text('body_en');
            $table->string('tags')->index();
            $table->string('tags_en')->index();

            $table->string('original');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
