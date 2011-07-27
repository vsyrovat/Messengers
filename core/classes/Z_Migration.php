<?php
/**
 * User: Master
 * Date: 27.07.11
 * Time: 4:15
 */
 
class Z_Migration extends Z_Object implements iMigration {
	protected
		$db;

	function afterSet(){
		$this->db = $this->factory->getObjectByInterface('iDatabase');
	}

	function up(){}

	function down(){}

	protected function query($query_string, $params = array()){
		return $this->db->query($query_string, $params);
	}

}
