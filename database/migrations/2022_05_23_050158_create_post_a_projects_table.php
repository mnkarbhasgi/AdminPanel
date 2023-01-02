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
        Schema::create('post_a_projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 1500);
            $table->string('email', 1500);
            $table->string('phone', 1500);
            $table->string('company', 1500)->nullable();
            $table->string('domain', 1500)->nullable();
            $table->string('company_size', 1500)->nullable();
            $table->string('service', 1500)->nullable();
            $table->string('budget', 1500)->nullable();
            $table->string('message', 2500)->nullable();
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
        Schema::dropIfExists('post_a_projects');
    }
};
