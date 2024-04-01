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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name')->nullable();
            $table->json('description')->nullable();
            $table->string('image')->nullable();
            $table->date('date_of_birth');
            $table->json('client')->nullable();
            $table->json('project_type')->nullable();
            $table->json('duration')->nullable();
            $table->string('live_url');
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
        Schema::dropIfExists('projects');
    }
};
