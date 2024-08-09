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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_order_id');
            $table->string('employee_code');
            $table->timestamp('payment_date');
            $table->tinyInteger('type')->comment('1=bm,2=dp,3=installment');
            $table->bigInteger('installment_no')->nullable();
            $table->float('amount',10,2)->nullable();
            $table->float('tax',10,2)->nullable();
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
        Schema::dropIfExists('commissions');
    }
};
