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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->string('name',256)->nullable();
            $table->string('number');
            $table->unsignedInteger('project_id')->comment('Project Primary ID');
            $table->unsignedInteger('plot_category_id')->comment('Plot Category Primary ID');
            $table->unsignedInteger('plot_type_id')->comment('Plot Type Primary ID');
            $table->integer('plot_size',)->default(0);
            $table->float('unit_price',12,2)->default(0);
            $table->longText('description')->nullable();
            $table->text('video')->nullable();
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
        Schema::dropIfExists('plots');
    }
};
