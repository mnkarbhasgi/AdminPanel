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
        Schema::create('industry_details', function (Blueprint $table) {
            $table->id();
            $table->integer('industry_id');
            $table->string('title', 1500)->nullable();
            $table->string('content', 2500)->nullable();
            $table->string('content_2', 2500)->nullable();
            $table->string('image_name', 1000);
            $table->string('image_path', 1000);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('industry_details');
    }
};
