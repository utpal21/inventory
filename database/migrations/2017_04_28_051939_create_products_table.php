<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        DB::unprepared('CREATE PROCEDURE test() BEGIN SELECT * FROM users; END');
        //DB::unprepared('CREATE PROCEDURE my_procedure( IN param INT(10) )  BEGIN  /* here your SP code */ END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
       // DB::unprepared('DROP PROCEDURE IF EXISTS my_procedure');
    }
}
