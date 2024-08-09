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
        Schema::create('plot_order_installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_order_id');
            $table->foreignId('client_id');
            $table->tinyInteger('installment_no');
            $table->float('amount',10,2);
            $table->timestamp('payment_date')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=not paid,1=paid');
            
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
        Schema::dropIfExists('plot_order_installments');
    }
};
