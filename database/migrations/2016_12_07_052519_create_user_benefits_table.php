<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('health');
            $table->string('vision');
            $table->string('dental');
            $table->string('life');
            $table->string('retirement');
            $table->string('first_1');
            $table->string('last_1');
            $table->string('relation_1');
            $table->string('first_2');
            $table->string('last_2');
            $table->string('relation_2');
            $table->string('first_3');
            $table->string('last_3');
            $table->string('relation_3');
            $table->string('first_4');
            $table->string('last_4');
            $table->string('relation_4');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
