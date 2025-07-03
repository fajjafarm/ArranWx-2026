<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocations2Table extends Migration
{
    public function up()
    {
        Schema::create('locations2', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alternative_name')->nullable();
            $table->enum('type', ['Village', 'Marine', 'Pier', 'Hill']);
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
            $table->integer('altitude');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations2');
    }
}
