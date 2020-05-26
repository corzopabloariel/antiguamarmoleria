<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order', 3)->nullable()->default(NULL);
            $table->string('title', 100)->unique();
            $table->string('title_slug', 100)->nullable()->default(NULL);
            $table->json('sliders')->nullable()->default(NULL);
            $table->json('resume')->nullable()->default(NULL);
            $table->text('answer')->nullable()->default(NULL);
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
        Schema::dropIfExists('faqs');
    }
}
