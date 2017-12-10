<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_product_group', function (Blueprint $table) {
            $table->increments('p_group_id', 20);
            $table->string('p_group_name', 200);
            $table->boolean('is_active');
            $table->string('cr_by');
            $table->timestamp('cr_date')->nullable();
            $table->string('up_by', 50)->nullable();
            $table->timestamp('up_date')->nullable();
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
        Schema::dropIfExists('inv_product_group');
    }
}
