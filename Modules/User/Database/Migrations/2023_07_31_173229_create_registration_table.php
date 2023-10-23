<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->tinyText('mobile');
            $table->mediumText('email');
            $table->integer('code');
            $table->enum('type' ,['sign-up-by-sms' ,'sign-up-by-email' ,'sign-in-by-sms' ,'sign-in-by-email']);
            $table->tinyInteger('sent_count' )->default(0);
            $table->tinyInteger('try_count' )->default(0);
            $table->timestamp('verified' )->nullable();
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
        Schema::dropIfExists('sms');
    }
};
