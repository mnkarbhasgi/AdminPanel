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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 2500);
            $table->string('category', 2500);
            $table->string('featured_content', 2500);
            $table->string('featured_image_name', 2500);
            $table->string('featured_image_path', 2500);
            $table->longText('main_blog', 2500);
            $table->string('author', 2500);            
            $table->integer('status')->default(1);            
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
        Schema::dropIfExists('blogs');
    }
};
