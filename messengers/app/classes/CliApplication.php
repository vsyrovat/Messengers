<?php
/**
 * User: Master
 * Date: 24.07.11
 * Time: 4:48
 */
 
class CliApplication extends Z_ToolApplicationPrototype {

	function icq_status(){
		$status = $this->Icq->getStatus();
	}

}
