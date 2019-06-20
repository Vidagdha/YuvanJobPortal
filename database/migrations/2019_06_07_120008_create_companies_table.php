<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employer_id');
            $table->string('company_name', 100)->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_contact')->nullable();
            $table->string('company_slug')->nullable();
            $table->string('company_slogan')->nullable();
            $table->string('profile_description', 1000)->nullable();
            $table->unsignedBigInteger('business_stream_id')->nullable();
            $table->date('establishment_date')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_website_url', 500)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
