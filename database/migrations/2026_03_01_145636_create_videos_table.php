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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();

            $table->integer('position')->default(0);
            $table->string('title')->index();
            $table->string('title_en')->index();
            $table->string('slug');
            $table->string('url');
            $table->integer('year');

            $table->string('tags')->index();
            $table->string('tags_en')->index();
            $table->text('body')->nullable();
            $table->text('body_en')->nullable();

            $table->string('original');
            $table->string('thumbnail');

            $table->integer('views')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
