<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('products', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('description');
                $table->string('short_description');
                $table->bigInteger('ean_code');
                $table->string('serial_number');
                $table->bigInteger('invoice_number');
                $table->integer('weight');
                $table->string('country_code');
                $table->string('location');
                $table->string('supplier');
                $table->string('quality_label');
                $table->string('status');
                $table->string('tax_group');
                $table->string('problem_description');
                $table->string('color');
                $table->float('msrp');

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
        Schema::drop('products');
    }

}
