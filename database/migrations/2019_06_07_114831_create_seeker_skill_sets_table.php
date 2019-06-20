<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeekerSkillSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeker_skill_sets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('user_account_id');
            $table->unsignedBigInteger('skill_set_id');
            $table->unsignedInteger('skill_level');
            $table->timestamps();
        });

//        Schema::table('seeker_skill_sets', function (Blueprint $table){
//            $table->foreign('user_account_id')
//                ->references('id')->on('users')
//                ->onDelete('cascade');
//
//            $table->foreign('skill_set_id')
//                ->references('id')->on('skill_sets')
//                ->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seeker_skill_sets');
    }
}
