<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawlerHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_histories', function (Blueprint $table) {
            $table->id();
            $table->string('domain')->nullable();
            $table->string('url')->nullable();
            $table->string('listProduct')->nullable();
            $table->string('nameProduct')->nullable();
            $table->string('priceProduct')->nullable();
            $table->string('imageProduct')->nullable();
            $table->string('hasTag')->nullable();
            $table->string('category')->nullable();
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
        Schema::dropIfExists('crawler_histories');
    }
}
