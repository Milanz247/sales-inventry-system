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
        Schema::create('billitemtempories', function (Blueprint $table) {
            $table->id();
            $table->string('item_Code')->unique();
            $table->string('item_name')->nullable();
            $table->integer('price')->nullable();
            $table->string('warranty')->nullable();
            $table->string('quantity')->nullable();
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
        Schema::dropIfExists('billitemtempories');
    }
};
