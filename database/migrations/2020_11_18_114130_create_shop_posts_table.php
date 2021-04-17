<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->String('title')->nullable();
            $table->string('category')->nullable();
            $table->string('sub_category_1')->nullable();
            $table->string('sub_category_2')->nullable();
            $table->text('description')->nullable();
//            $table->string('shop_id')->nullable();
            $table->Integer('shop_id')->unsigned()->nullable();
//            $table->UnsignedTinyInteger('status')->default(0)->comment('0=Inactive|1=Active|2=Ban');
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->string('time')->nullable();
            $table->string('price')->nullable();
            $table->string('offer_price')->nullable();
            $table->string('discount_price')->nullable();
//            $table->integer('price')->nullable();
//            $table->integer('offer_price')->nullable();
//            $table->integer('discount_price')->nullable();
            $table->string('unit')->nullable();
            $table->string('quantity')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('shop_id')->references('id')->on('shop_registrations');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_posts');
    }
}
