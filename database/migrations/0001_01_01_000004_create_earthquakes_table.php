<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarthquakesTable extends Migration
{
    public function up()
    {
        Schema::create('earthquakes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time');
            $table->string('place');
            $table->float('latitude');
            $table->float('longitude');
            $table->integer('depth')->default(0);
            $table->float('magnitude');
            $table->string('link')->nullable();
            $table->timestamps();

            $table->index('time');
            $table->unique(['time', 'place']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('earthquakes');
    }
}