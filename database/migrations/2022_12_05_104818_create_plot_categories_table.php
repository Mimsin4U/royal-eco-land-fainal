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
        Schema::create('plot_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->text('short_desc'); 
            $table->longText('long_desc')->nullable(); 
            $table->text('image')->nullable();
            $table->text('vedio')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=Active,0=Inactive');
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
        Schema::dropIfExists('plot_categories');
    }
};
