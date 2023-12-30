<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHistoyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_histoy', function (Blueprint $table) {
            $table->string('id_account')->primary();
            $table->string('username');
            $table->date('date');
            $table->string('status');
            $table->string('transaction_type');
            $table->bigInteger('total_per_account');
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
        Schema::dropIfExists('transaction_histoy');
    }
}
