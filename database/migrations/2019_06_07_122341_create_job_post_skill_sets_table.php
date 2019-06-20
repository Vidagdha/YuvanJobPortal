<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostSkillSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_post_skill_sets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('skill_set_id');
            $table->unsignedBigInteger('job_post_id');
            $table->unsignedInteger('skill_level');
            $table->timestamps();
        });

//        Schema::table('job_post_skill_sets', function (Blueprint $table) {
//            $table->foreign('skill_set_id')
//                ->references('id')->on('skill_sets');
//
//            $table->foreign('job_post_id')
//                ->references('id')->on('job_posts');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_post_skill_sets');
    }
}
