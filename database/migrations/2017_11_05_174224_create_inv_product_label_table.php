<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvProductLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('inv_product_label', function (Blueprint $table) {
          $table->increments('p_label_id');
          $table->string('p_label_name');
          $table->boolean('is_active');
          $table->string('cr_by');
          $table->string('up_by');
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
        Schema::dropIfExists('inv_product_label'); 
    }
}
