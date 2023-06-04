<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('directors')->comment('directors,generals');
            $table->string('photo')->nullable();
            $table->string('name');
            $table->string('nickname');
            $table->string('job_title')->nullable();
            $table->string('period')->nullable();
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
        Schema::drop('directors');
    }
}
