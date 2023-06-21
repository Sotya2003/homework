<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('name');
            $table->string('email');
            $table->text('address');
            $table->string('phone');
            $table->string('item');
            $table->integer('qty');
            $table->text('img_1')->nullable();
            $table->text('img_2')->nullable();
            $table->text('img_3')->nullable();
            $table->text('img_4')->nullable();
            $table->bigInteger('price');
            $table->bigInteger('total_price');
            $table->enum('service_status',['processing','ontheway','working','complete']);
            $table->string('worker');
            $table->enum('paid_status',['Unpaid','Paid']);
            $table->text('paymentToken')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
