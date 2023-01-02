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
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1500);
            $table->string('shortname', 1500);
            $table->string('featured_content', 2500);
            $table->string('featured_image_name', 1000);
            $table->string('featured_image_path', 1000);
            $table->string('banner_image_name', 1000);
            $table->string('banner_image_path', 1000);
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
        Schema::dropIfExists('industries');
    }
};
