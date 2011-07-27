<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 23.12.2010
 * Time: 19:24:55
 */

return array(

	'logs' => array(
		'cli' => array(
			'logfile' => APP_LOG_PATH . 'cli.log',
			'errorfile' => APP_LOG_PATH . 'cli_error.log',
		),
		'web' => array(
			'logfile' => APP_LOG_PATH . 'web.log',
			'errorfile' => APP_LOG_PATH .'web_error.log',
		),
	),

	'db1' => array(
		'connection_string' => 'mysql:dbname=messengers_db;host=localhost;port=3306',
		'driver' => 'mysql',
		'charset' => 'utf8',
		'collation' => 'utf8_general_ci',
		'database' => 'messengers_db',
		'prefix' => '',
		'username' => 'root',
		'password' => '',
		'host' => 'localhost',
		'port' => 3306,
	),


);