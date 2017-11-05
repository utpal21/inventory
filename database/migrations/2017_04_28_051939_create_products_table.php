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
        DB::unprepared("DROP PROCEDURE IF EXISTS inv_p_product_label; CREATE PROCEDURE `inv_p_product_label`(in `v_p_label_id` VARCHAR(255), in `v_p_label_name` VARCHAR(255))
            BEGIN IF `v_p_label_id`='' THEN
            SELECT `p_label_id`, `p_label_name`, `is_active`, `cr_by`, `cr_date`, `up_by`, `up_date`
            FROM `inv_product_label`; ELSE SELECT `p_label_id`, `p_label_name`, `is_active`, `cr_by`, `cr_date`, `up_by`, `up_date`
            FROM `inv_product_label`
            WHERE `p_label_id`=`v_p_label_id`;
            END IF; END ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');       
    }
}
