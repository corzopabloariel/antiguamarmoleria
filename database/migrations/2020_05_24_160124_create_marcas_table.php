<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order', 3)->nullable()->default(NULL);
            $table->json('logo')->nullable()->default(NULL);
            $table->json('color')->nullable()->default(NULL);
            $table->string('title', 100)->unique();
            $table->string('title_slug', 100)->nullable()->default(NULL);
            $table->json('sliders')->nullable()->default(NULL);
            $table->json('advantage')->nullable()->default(NULL);
            $table->boolean('is_destacado')->default(false);
            $table->boolean('elim')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcas');
    }
}
