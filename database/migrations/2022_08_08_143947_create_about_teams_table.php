<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_teams', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 2500);
            $table->string('sub_heading', 2500);
            $table->string('pic_name', 2500)->nullable();
            $table->string('pic_path', 2500);
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
        Schema::dropIfExists('about_teams');
    }
}
