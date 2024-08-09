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
        Schema::create('plot_orders', function (Blueprint $table) {
            $table->id();
            $table->string('confirmed_by');
            $table->foreignId('client_id');
            $table->string('client_nid')->nullable();
            $table->string('nomine')->nullable();
            $table->string('nomine_nid')->nullable();
            $table->string('category_name');
            $table->string('plot_no');
            $table->string('plot_uid')->unique();
            $table->integer('plot_area');
            $table->string('plot_road_no');
            $table->float('total_price',10,2);
            $table->float('total_price_extended', 10, 2)->nullable();
            $table->float('booking_money', 10, 2);
            $table->timestamp('down_payment_date');
            $table->float('down_payment', 10, 2)->nullable();
            $table->tinyInteger('installment_years')->nullable();
            $table->tinyInteger('installment_count')->nullable();
            $table->integer('amount_per_installment')->nullable();
            $table->float('paid_amount',10,2);
            $table->float('due_amount',10,2)->default(00);
            $table->tinyInteger('status')->default(1)->comment('1=bm paid,2=dp paid');
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
        Schema::dropIfExists('plot_orders');
    }
};
