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
        Schema::create('visit_requests', function (Blueprint $table) {
            $table->id();
            $table->string('category_name')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile')->default(null);
            $table->string('address')->nullable();
            $table->string('assigned_to')->nullable()->comment('Team Code');
            $table->timestamp('visit_date', $precision = 0)->default(null);
            $table->string('status')->default('Pending..');
            $table->text('feedback')->nullable();
            $table->timestamp('follow_date')->nullable();
            $table->string('message')->nullable();
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
        Schema::dropIfExists('visit_requests');
    }
};
