<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products',function($table) {
            $table->string('description')->nullable()->change();
            $table->string('short_description')->nullable()->change();
            $table->bigInteger('ean_code')->nullable()->change();
            $table->string('serial_number')->nullable()->change();
            $table->bigInteger('invoice_number')->nullable()->change();
            $table->integer('weight')->nullable()->change();
            $table->string('country_code')->nullable()->change();
            $table->string('location')->nullable()->change();
            $table->decimal('msrp',10,2)->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('quality_label')->nullable()->change();
            $table->string('tax_group')->nullable()->change();
            $table->string('problem_description')->nullable()->change();
            $table->string('color')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products',function($table) {
            $table->increments('id')->change();
            $table->string('name')->change();
            $table->string('description')->change();
            $table->string('short_description')->change();
            $table->bigInteger('ean_code')->change();
            $table->string('serial_number')->change();
            $table->bigInteger('invoice_number')->change();
            $table->integer('weight')->change();
            $table->string('country_code')->change();
            $table->string('location')->change();
            $table->string('supplier')->change();
            $table->string('quality_label')->change();
            $table->string('status')->change();
            $table->string('tax_group')->change();
            $table->string('problem_description')->change();
            $table->string('color')->change();
            $table->float('msrp')->change();
        });
    }
}
