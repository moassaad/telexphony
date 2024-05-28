<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('UserID', 128)->primary()->unique();
            $table->string('full_name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number');
            $table->string('address');
            // $table->string('token', 40);
            $table->timestamp('email_verified_at')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
