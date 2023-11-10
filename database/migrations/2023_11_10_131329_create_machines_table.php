<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->bigInteger('barcode_id')->primary();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('machine_name');
            $table->enum('machine_status', ["New", "Used", "Damaged", "Sold"]);
            $table->integer('purchase_price')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('manufacture_date')->nullable();
            $table->date('warranty_expiry_date')->nullable();
            $table->string('warehouse_location');
            $table->string('station_location');
            $table->string('floor_location')->nullable();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('machine_types');
            $table->foreign('brand_id')->references('id')->on('machine_brands');
        });

        // DB::unprepared('CREATE TRIGGER addBarcodeID BEFORE INSERT ON `machines` FOR EACH ROW
        //         BEGIN
        //            DECLARE BID INT(10) DEFAULT 0;
        //            SET BID = (SELECT MAX(CAST(barcode_id AS SIGNED)) FROM machines) + 1;
        //            SET new.barcode_id = LPAD(BID, 9, "0");
        //         END');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
