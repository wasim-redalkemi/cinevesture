<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type',['A','U'])->default('U');
            $table->enum('status',["0","1"])->default("1");
            $table->string('first_name',50);
            $table->string('last_name',50)->nullable();
            $table->enum('is_profile_complete',["0","1"])->default("0");
            $table->string('google_id',255)->nullable();
            $table->string("age")->nullable();
            $table->string("profile_image",255)->nullable();
            $table->string('gender')->nullable();
            $table->string('gender_pronouns')->nullable();
            $table->enum('available_to_work_in',['virtually','physically'])->nullable();
            $table->string('about')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('job_title',50)->nullable();
            $table->string('imdb_profile',255)->nullable();
            $table->string('linkedin_profile',255)->nullable();
            $table->string('website',255)->nullable();
            $table->string('intro_video_link',500)->nullable();
            $table->string('intro_video_thumbnail',500)->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
