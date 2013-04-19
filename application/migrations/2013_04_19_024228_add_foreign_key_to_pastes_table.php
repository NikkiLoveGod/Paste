<?php

class Add_Foreign_Key_To_Pastes_Table {    

	public function up()
    {
		Schema::table('pastes', function($table) {	
	    	$table->foreign('parent_id')
	    						->references('id')
	    						->on('pastes')
	    						->on_update('CASCADE')
	    						->on_delete('SET NULL');
	    });
    }    

	public function down()
    {
		Schema::table('pastes', function($table) {
			$table->drop_foreign('pastes_parent_id_foreign');
	});

    }

}