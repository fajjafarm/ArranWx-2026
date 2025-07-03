<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuroraForecastsTable extends Migration
{
    public function up()
    {
        Schema::create('aurora_forecasts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time'); // Forecast timestamp
            $table->float('kp'); // Kp value
            $table->string('label'); // Display label (e.g., "Jun 01 15:00")
            $table->dateTime('cached_at'); // Cache timestamp
            $table->timestamps();

            $table->index('cached_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aurora_forecasts');
    }
}