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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('pizza_id')->constrained();
            $table->foreignId('crust_option_id')->nullable()->constrained();
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });

        Schema::create('order_detail_cold_drink', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id')->constrained()->onDelete('cascade');
            $table->foreignId('cold_drink_id')->constrained();
            $table->integer('quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detail_cold_drink');
        Schema::dropIfExists('order_details');
    }
};
