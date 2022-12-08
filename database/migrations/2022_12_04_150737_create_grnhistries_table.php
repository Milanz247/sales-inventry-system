<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grnhistries', function (Blueprint $table) {
            $table->id();
            $table->string('supplier')->nullable();
            $table->string('item_code')->nullable();
            $table->integer('Buying_price')->nullable();
            $table->integer('Selling_price')->nullable();
            $table->string('warranty')->nullable();
            $table->string('quantity')->nullable();
            $table->string('totle_price')->nullable();
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
        Schema::dropIfExists('grnhistries');
    }
};
