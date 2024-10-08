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
        Schema::create('senior_manegers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('director_id')->constrained()->onDelete('cascade');
            $table->foreignId('joint_director_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->text('image')->nullable();
            $table->string('email');
            $table->string('code');
            $table->string('mobile')->nullable();
            $table->string('nid')->nullable();
            $table->string('fb')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('status')->default(1)->comment('0=inactive,1=active');
            
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
        Schema::dropIfExists('senior_manegers');
    }
};
