<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->String('shopname')->nullable();
            $table->string('email')->nullable();
            $table->String('phone_no')->nullable()->unique();
            $table->string('password')->nullable();
            $table->String('address')->nullable();
            $table->string('image')->nullable();
            $table->string('category')->nullable();
            $table->string('longitude')->nullable();
            $table->String('latitude')->nullable();
            $table->String('ip_address')->nullable();
            $table->UnsignedTinyInteger('status')->default(0)->comment('0=Inactive|1=Active|2=Ban');
            $table->rememberToken();
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
        Schema::dropIfExists('shop_registrations');
    }
}
