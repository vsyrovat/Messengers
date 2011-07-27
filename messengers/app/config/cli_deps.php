<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 24.12.2010
 * Time: 6:57:26
 */
 
return array(
	'offsets' => array(
		'down' => 0,
		'up' => 1,
	),

	'INSTANCES' => array(
		'icq_model' => array('config' => null),
		'logger' => array('class' => 'Z_Logger', 'config' => array('file' => APP_CONFIG_PATH.'config.php', 'branch'=>'/logs/cli')),
		'db1' => array('class'=>'Z_Mysqli', 'config'=>array('file'=>APP_CONFIG_PATH.'config.php', 'branch'=>'/db1')),
	),

	'DEPENDENCIES' => array(
		'class DaemonApplication' => array(
			'interface iLogger' => 'instance logger',
			'interface iXMLManager' => 'instance xmlman',
			'interface iDatabase' => 'instance db1',
			'class Z_Migration' => array(
				'interface iDatabase' => 'instance db1'
			)
		),
		'class ToolApplication' => array(
			'interface iLogger' => 'instance logger',
			'interface iXMLManager' => 'instance xmlman',
			'interface iDatabase' => 'instance db1'
		),
	)
);