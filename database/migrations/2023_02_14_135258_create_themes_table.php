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
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->required();
            $table->integer('view')->required()->default (0);
            $table->string('head')->required();
            $table->string('header')->nullable();
            $table->string('footer')->nullable();
            $table->string('blockt')->nullable();
            $table->string('tablet')->nullable();
            $table->string('table1')->nullable();
            $table->string('table2')->nullable();
            $table->string('cat')->nullable();
            $table->string('catplay')->nullable();
            $table->string('play')->nullable();
            $table->string('setblock')->required();
            $table->integer('indexn')->required()->default (0);
            $table->string('folder')->nullable();

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
        Schema::dropIfExists('themes');
    }
};
