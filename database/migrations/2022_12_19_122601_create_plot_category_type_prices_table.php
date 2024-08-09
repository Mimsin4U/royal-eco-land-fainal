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
        Schema::create('plot_category_type_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('plot_category_id')->comment('Plot Category Primary ID');
            $table->unsignedInteger('plot_type_id')->comment('Plot Type Primary ID');
            $table->decimal('unit_price',12,2)->default(0);
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
        Schema::dropIfExists('plot_category_type_prices');
    }
};
