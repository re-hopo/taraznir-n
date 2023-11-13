<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('tag' ,255)->nullable();
            $table->longText('content')->nullable();
            $table->text('cover')->nullable();
            $table->text('thumbnail')->nullable();
            $table->enum('status', ['publish', 'draft'])->default('publish');
            $table->integer('chosen')->nullable()->default(0);
            $table->bigInteger('featured_image_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standards');
    }
};