<?php
/**
 * User: Master
 * Date: 24.07.11
 * Time: 6:03
 */
 
class IcqModel extends Z_Model implements iIMDriver {
	protected
		$is_connected = false,
		$error = null;

	function getStatus(){
		return 'not authorized';
	}


	function login(){

	}


	function check_connection($force_login = true){
		$this->error = 'Method not implemented';
		return false;
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
