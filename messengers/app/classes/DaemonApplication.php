<?php
/**
 * User: Master
 * Date: 24.07.11
 * Time: 8:22
 */
 
class DaemonApplication extends Z_CliApplication {

	function run(){
		$this->logger = $this->factory->getObjectByInterface('iLogger');
		while(true){

			/* ICQ */
			try {
				if ($this->Icq->check_connection()){
					$icq_send_messages = $this->Messages->get_send_messages('icq');
					$this->Icq->send_messages($icq_send_messages);
					unset($icq_send_messages);
					$icq_receive_messages = $this->Icq->receive_messages();
					$this->Messages->put_received_messages('icq', $icq_receive_messages);
					unset($icq_receive_messages);
				} else {
					$this->logger->logError('ICQ error: '.$this->Icq->getError());
				}
			} catch (Exception $e){	}

			sleep(1);
		}
	}

}
