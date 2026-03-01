<?php

use App\Models\Project;
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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Project::class)->constrained()->cascadeOnDelete();

            $table->integer('position')->default(0);
            $table->string('title')->index();
            $table->string('title_en')->index();
            $table->string('slug');
            $table->integer('year');
            $table->string('size');
            $table->string('technique');
            $table->string('technique_en');

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
        Schema::dropIfExists('photos');
    }
};
