<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablesAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->foreign('village_id')->references('id')->on('villages');
        });
        Schema::table('purchases', function (Blueprint $table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
        Schema::table('sales', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->dropForeign('village_id');
        });
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropForeign('supplier_id');
        });
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('customer_id');
        });
    }
}
