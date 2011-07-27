<?php
/**
 * User: Master
 * Date: 24.07.11
 * Time: 6:03
 */
 
class IcqModel extends Z_Model implements iIMDriver {
	protected
		$is_connected = false,
		$error = null,
		$driver;

	function __construct(){
		$this->driver = new mlCQ();
		$this->driver->start_logging(APP_LOG_PATH.'lmcq.log');
		$this->driver->create_identity("me", '605639512', 'ab123456');
		$this->driver->connect();
		$this->driver->login();
		$this->driver->set_status('ONLINE', 'DCDISABLED');
		$this->driver->send_message(199942, "Превед!");
	}

	function getStatus(){
		return 'not authorized';
	}


	function login(){
	}


	function check_connection($force_login = true){

	}


	function logout(){

	}


	function sendMessage(){

	}


	function receiveMessages(){

	}


	function getError(){
		return $this->error;
	}
	
}