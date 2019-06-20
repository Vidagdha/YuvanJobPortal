<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_post_activities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('user_account_id');
            $table->unsignedBigInteger('job_post_id');
            $table->unsignedBigInteger('employer_id');
            $table->date('apply_date');
            $table->timestamps();
        });

//        Schema::table('job_post_activities', function(Blueprint $table){
//            $table->foreign('user_account_id')
//                ->references('id')->on('users')
//                ->onDelete('cascade');
//
//            $table->foreign('job_post_id')
//                ->references('id')->on('job_posts')
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
        Schema::dropIfExists('job_post_activities');
    }
}
