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
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();
            $table->string('title',256)->nullable();
            $table->string('slogan',256)->nullable();
            $table->longText('mission')->nullable();
            $table->longText('vission')->nullable();
            $table->longText('policy')->nullable();
            $table->longText('term')->nullable();
            $table->longText('value')->nullable();
            $table->longText('service')->nullable();
            $table->longText('whyus')->nullable();
            $table->longText('overview')->nullable();
            $table->text('logo_png')->nullable();
            $table->text('logo_jpg')->nullable();
            $table->text('favicon')->nullable(); 
            $table->string('contact_number_one',20)->default('+880177');
            $table->string('contact_number_two',20)->default('+325256');
            $table->text('address_one')->nullable();
            $table->text('address_two')->nullable();
            $table->string('email',)->nullable();
            $table->string('fb_link',)->nullable();
            $table->string('linkedin_link',)->nullable();
            $table->string('youtube_link',)->nullable();
            $table->string('whatsapp',)->nullable();
            $table->text('profile')->nullable();
            $table->text('trade_license')->nullable();
            $table->tinyInteger('status')->default(1)->comment('Active=1,Inactive=0');
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
        Schema::dropIfExists('company_infos');
    }
};
