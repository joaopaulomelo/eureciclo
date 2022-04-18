<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_histories', function (Blueprint $table) {
            $table->id();
            $table->string('buyer');
            $table->longText('description');
            $table->longText('unit_price');
            $table->longText('amount');
            $table->longText('address');
            $table->longText('provider');
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
        Schema::dropIfExists('purchase_histories');
    }
}
