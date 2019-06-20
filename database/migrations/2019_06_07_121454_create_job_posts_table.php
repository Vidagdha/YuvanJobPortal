<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('posted_by_id')->nullable();
            $table->unsignedBigInteger('job_type_id')->nullable();
            $table->unsignedBigInteger('business_stream_id')->nullable();
            $table->string('job_title')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->date('created_date')->nullable();
            $table->date('last_date')->nullable();
            $table->string('salary')->nullable();
            $table->string('slug')->nullable();
            $table->string('required_skills')->nullable();
            $table->string('job_description', 500)->nullable();
            $table->string('job_location')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });

//        Schema::table('job_posts', function(Blueprint $table){
//            $table->foreign('posted_by_id')
//                ->references('id')->on('employers');
//
//            $table->foreign('job_type_id')
//                ->references('id')->on('job_types');
//
//            $table->foreign('company_id')
//                ->references('id')->on('companies');
//
//            $table->foreign('job_location_id')
//                ->references('id')->on('job_locations');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
