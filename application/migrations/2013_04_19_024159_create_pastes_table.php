<?php

class Create_Pastes_Table {    

	public function up()
    {
		Schema::create('pastes', function($table) {
			$table->increments('id');
			$table->text('content');
			$table->integer('parent_id')->unsigned()->nullable();
			$table->string('shortcode')->unique();
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('pastes');
    }

}