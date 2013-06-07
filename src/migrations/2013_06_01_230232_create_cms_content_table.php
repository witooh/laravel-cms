<?php

use Illuminate\Database\Migrations\Migration;

class CreateCmsContentTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_content',
            function ($table) {
                $table->increments('id');
                $table->integer('category_id');
                $table->integer('user_id');
                $table->string('title', 250);
                $table->text('content')->nullable();
                $table->boolean('published');
                $table->timestamps();

                $table->index('category_id');
                $table->index('user_id');
                $table->index('title');
                //$table->foreign('category_id')->references('id')->on('cms_category');
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
        Schema::dropIfExists('cms_content');
    }

}