<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRfqRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('rfq_for');
            $table->string('state');
            $table->string('project_ref');
            $table->string('currency');
            $table->string('fob_point');	
            $table->string('freight_quote');
            $table->string('publish_date');
            $table->string('closing_date');
            $table->string('vendor_remarks');
            $table->string('file');
            $table->string('terms');
            $table->string('is_flexible');
            $table->string('vendor_email');
            $table->string('is_public');
            $table->string('approving_authority');
            $table->string('rfq_criteria');
            $table->string('scoring_mathalogy');
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
        Schema::dropIfExists('rfqs');
    }
}
