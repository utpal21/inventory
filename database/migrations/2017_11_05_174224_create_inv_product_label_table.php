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
          $table->timestamp('cr_date')->nullable();
          $table->string('up_by', 50)->nullable();
          $table->timestamp('up_date')->nullable();
          $table->timestamps();
      });

      DB::unprepared("DROP PROCEDURE IF EXISTS inv_p_product_label; CREATE PROCEDURE `inv_p_product_label`(in `v_p_label_id` VARCHAR(255), in `v_p_label_name` VARCHAR(255))
            BEGIN IF `v_p_label_id`='' THEN
            SELECT `p_label_id`, `p_label_name`, `is_active`, `cr_by`, `cr_date`, `up_by`, `up_date`
            FROM `inv_product_label`; ELSE SELECT `p_label_id`, `p_label_name`, `is_active`, `cr_by`, `cr_date`, `up_by`, `up_date`
            FROM `inv_product_label`
            WHERE `p_label_id`=`v_p_label_id`;
            END IF; END ");

      DB::unprepared("DROP PROCEDURE IF EXISTS inv_iu_product_label; CREATE  PROCEDURE `inv_iu_product_label`(in `v_p_label_id` VARCHAR(255), in `v_p_label_name` VARCHAR(255), in `v_is_active` INT, in `v_cr_by` VARCHAR(255))
          BEGIN  DECLARE msg VARCHAR(255);
          if `v_p_label_id`='' THEN
          IF ( EXISTS(SELECT * FROM inv_product_label WHERE `p_label_name`=`v_p_label_name`)  ) THEN
          SET msg='DATA ALREADY EXITS.';
          ELSE
          INSERT INTO `inv_product_label`( `p_label_name`,`is_active`, `cr_by`, `cr_date`)
          VALUES (`v_p_label_name`,`v_is_active`,`v_cr_by`,NOW());
          SET msg='SAVE SUCCESSFULLY';
          END IF;
          ELSEIF ( EXISTS(SELECT * FROM inv_product_label WHERE `p_label_name`=`v_p_label_name`) ) THEN
          UPDATE `inv_product_label`
          SET
          `is_active`=`v_is_active`,
          `up_by`=`v_cr_by`,
          `up_date`=NOW()
          WHERE `p_label_id`=`v_p_label_id`;
          SET msg='PRODUCT LABEL NAME ALREADY EXISTS.OTHER INFORMATION UPDATE SUCCESSFULLY';
          ELSE
          UPDATE `inv_product_label`
          SET
          `p_label_name`=`v_p_label_name`,
          `is_active`=`v_is_active`,
          `up_by`=`v_cr_by`,
          `up_date`=NOW()
          WHERE `p_label_id`=`v_p_label_id`;
          SET msg='UPDATE SUCCESSFULLY';
          END IF; SELECT msg;
          END");

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
