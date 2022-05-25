<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_details', function (Blueprint $table) {
            $table->id();
            $table->integer("event_id");
            $table->integer("frequency")->nullable(); // days,week,year,month
            $table->integer("week_days")->nullable(); //sun,mon,tue..
            $table->integer("qty")->nullable(); //first,second,third,other
            $table->integer("months")->nullable(); //3,4,months
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
        Schema::dropIfExists('event_details');
    }
}
