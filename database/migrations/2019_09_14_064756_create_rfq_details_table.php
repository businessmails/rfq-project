<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfq_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rfq_id')->unsigned();
            $table->tinyInteger('item_name');
            $table->string('stock');	
            $table->string('location');
            $table->string('item_description');
            $table->string('part_no');
            $table->string('qty_required');
            $table->string('unit');
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
        Schema::dropIfExists('rfq_details');
    }
}
