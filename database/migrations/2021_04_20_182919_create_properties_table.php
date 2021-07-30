<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('type');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->integer('item_code');
            $table->string('phone');
            $table->string('condition')->nullable();
            $table->integer('price')->nullable();
            $table->string('image')->nullable();
            $table->string('featureImg')->nullable();
            $table->string('lga')->nullable();
            $table->string('state')->nullable();
            $table->string('address');
            $table->integer('published')->default(0);
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
        Schema::dropIfExists('properties');
    }
}
