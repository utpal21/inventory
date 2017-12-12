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

        DB::unprepared("DROP PROCEDURE IF EXISTS inv_iu_product_group; CREATE PROCEDURE `inv_iu_product_group`(in `v_p_group_id` VARCHAR(255), in `v_p_group_name` VARCHAR(255), in `v_is_active` INT, in `v_cr_by` VARCHAR(255))
        BEGIN
        DECLARE msg VARCHAR(255);
        if `v_p_group_id`='' THEN
        IF ( EXISTS(SELECT * FROM inv_product_group WHERE `p_group_name`=`v_p_group_name`) ) THEN
        SET msg='DATA ALREADY EXITS.';
        ELSE
        INSERT INTO `inv_product_group`( `p_group_name`,`is_active`, `cr_by`, `cr_date`)
        VALUES (`v_p_group_name`,`v_is_active`,`v_cr_by`,NOW());
        SET msg='SAVE SUCCESSFULLY';

        END IF;
        ELSEIF ( EXISTS(SELECT * FROM inv_product_group WHERE `p_group_name`=`v_p_group_name`) ) THEN
        UPDATE `inv_product_group`
        SET
        `is_active`=`v_is_active`,
        `up_by`=`v_cr_by`,
        `up_date`=NOW()
        WHERE `p_group_id`=`v_p_group_id`;
        SET msg='GROUP NAME ALREADY EXISTS.OTHER INFORMATION UPDATE SUCCESSFULLY';

        ELSE
        UPDATE `inv_product_group`
        SET
        `p_group_name`=`v_p_group_name`,
        `is_active`=`v_is_active`,
        `up_by`=`v_cr_by`,
        `up_date`=NOW()
        WHERE `p_group_id`=`v_p_group_id`;
        SET msg='UPDATE SUCCESSFULLY';

        END IF;
        SELECT msg;
        END");
        DB::unprepared("DROP PROCEDURE IF EXISTS inv_p_product_group; CREATE PROCEDURE `inv_p_product_group`(in `v_p_group_id` VARCHAR(255), in `v_p_label_name` VARCHAR(255))
              BEGIN IF `v_p_group_id`='' THEN
              SELECT `p_group_id`, `p_group_name`, `is_active`, `cr_by`, `cr_date`, `up_by`, `up_date`
              FROM `inv_product_group`; ELSE SELECT `p_form_id`, `p_form_name`, `is_active`, `cr_by`, `cr_date`, `up_by`, `up_date`
              FROM `inv_product_group`
              WHERE `p_form_id`=`v_p_form_id`;
              END IF; END ");










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
