<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('session_number');
            $table->date('date');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down():void
    {
        Schema::dropIfExists('sessions');
    }
};
