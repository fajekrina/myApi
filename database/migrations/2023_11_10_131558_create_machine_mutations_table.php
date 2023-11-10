<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineMutationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_mutations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barcode_id');
            $table->text('mutation_description')->nullable();
            $table->string('previous_warehouse_location');
            $table->string('previous_station_location');
            $table->string('previous_floor_location')->nullable();
            $table->string('new_warehouse_location');
            $table->string('new_station_location');
            $table->string('new_floor_location')->nullable();
            $table->timestamps();

            // $table->foreign('barcode_id')->references('barcode_id')->on('machines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_mutations');
    }
}
