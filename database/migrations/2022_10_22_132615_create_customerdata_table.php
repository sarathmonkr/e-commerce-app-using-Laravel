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
        Schema::create('customerdata', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('address');
            $table->string('phone');
            $table->string('delivery_status')->default('Ordered');
            $table->string('product_names');
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
        Schema::dropIfExists('customerdata');
    }
};