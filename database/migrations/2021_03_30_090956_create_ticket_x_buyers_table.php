<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketXBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ticket_x_buyers', function (Blueprint $table) {
            $table->id();
            $table->integer('txb_ticket_id')->unsigned();
            $table->integer('txb_buyer_id')->unsigned();
            $table->integer('txb_quantity')->unsigned();
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
        Schema::dropIfExists('tbl_ticket_x_buyers');
    }
}
