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
        Schema::create('phone', function (Blueprint $table) {
            $table->string('PhoneID', 128)->primary()->unique();
            $table->string('phone_name');
            $table->string('model');
            $table->string('serial_number');
            $table->string('imei');
            $table->string('imei2');
            $table->timestamps();
            $table->foreignId('UserID')->constrained('user','UserID')->onDelete(null)->onUpdate(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone');
    }
};
