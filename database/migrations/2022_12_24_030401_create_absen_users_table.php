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
        Schema::create('absen_users', function (Blueprint $table) {
            $table->id();
            $table->string('work')->nullable();
            $table->string('task')->nullable();
            $table->string('task_desc')->nullable();
            $table->string('status');
            $table->string('status_desc');
            $table->foreignId('absen_id');
            $table->foreignId('user_id');
            $table->timestamps();
            $table->foreign('absen_id')->references('id')->on('absens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absen_users');
    }
};
