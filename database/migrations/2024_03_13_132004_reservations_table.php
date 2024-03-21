<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('reservations', function (Blueprint $table) {
            // $table->foreignId('session_id')->constrained()->onDelete('cascade');
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->integer('session_number');
            $table->string('session_name');
            $table->string('reason');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('reservations');
    }
};
