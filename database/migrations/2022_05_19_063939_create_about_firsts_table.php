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
        Schema::create('about_firsts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 2500)->nullable();
            $table->string('content', 2500);
            $table->string('content_2)', 2500);
            $table->string('pic_name', 2500);
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
        Schema::dropIfExists('about_firsts');
    }
};
