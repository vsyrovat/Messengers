<?php

/**
 * This migration created via console command
 */
class Migration_20110728040717 extends Z_Migration{

	function up(){
		return $this->query("create table `#__icq_messages`(
		`id` int(10) unsigned not null auto_increment,
		`type` enum('in','out') not null,
		`created` datetime,
		`is_sent` tinyint(1) not null default 0,
		`from_uin` varchar (15) null default null,
		`to_uin` varchar(15) null default null,
		primary key(`id`),
		index `i_from_uin`(`from_uin`),
		index `i_to_uin`(`to_uin`)
		)engine=innodb, default charset=utf8");
	}

	function down(){
		return $this->query("drop table `#__icq_messages`");
	}

}