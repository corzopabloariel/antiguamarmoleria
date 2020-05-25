<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marcas', function (Blueprint $table) {
            $table->text('resume')->nullable()->default(NULL)->after("title_slug");
            $table->text('description')->nullable()->default(NULL)->after("title_slug");
            $table->text('features')->nullable()->default(NULL)->after("title_slug");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marcas', function (Blueprint $table) {
            //
        });
    }
}
