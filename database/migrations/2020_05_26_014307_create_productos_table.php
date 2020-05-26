<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('marca_id')->nullable()->default(NULL);
            $table->string('order', 3)->nullable()->default(NULL);
            $table->string('title', 100)->unique();
            $table->string('title_slug', 100)->nullable()->default(NULL);
            $table->json('images')->nullable()->default(NULL);
            $table->json('characteristics')->nullable()->default(NULL);
            $table->boolean('elim')->default(false);

            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
