<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function($table){
            $table->string('ean_code',20)->change();
            $table->string('invoice_number',20)->change();
            $table->string('weight',11)->change();
            $table->string('msrp',12)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table){
            $table->bigInteger('ean_code')->change();
            $table->bigInteger('invoice_number')->change();
            $table->integer('weight')->change();
            $table->decimal('msrp',10,2)->change();
        });
    }
}
