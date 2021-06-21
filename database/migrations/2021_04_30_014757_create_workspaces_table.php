<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->id();
            
            $table->string('profile_picture');
            $table->string('name'); 
            $table->string('location');
            $table->string('mobile_one')->length(11);
            $table->string('mobile_two')->length(11)->nullable();
            $table->time('open_time');
            $table->time('close_time');
            $table->string('serve_food');
            $table->string('wifi');
           
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
        Schema::dropIfExists('workspaces');
    }
}
