<?php

use Illuminate\Database\Migrations\Migration;

class CreateCmsContentTable extends Migration {

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
                $table->string('name', 100);
                $table->timestamps();

                $table->index('name');
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