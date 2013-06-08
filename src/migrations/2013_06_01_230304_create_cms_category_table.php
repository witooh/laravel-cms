<?php

use Illuminate\Database\Migrations\Migration;

class CreateCmsCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cms_category',
            function ($table) {
                $table->increments('id');
                $table->integer('created_by');
                $table->string('name', 100);
                $table->timestamps();

                $table->index('name');
                //$table->index('created_by');
            }
        );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('cms_category');
	}

}