<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: Dec 22, 2010
 * Time: 4:26:04 PM
 */
 
return array(
	'offsets' => array(
		'down' => 0,
		'up' => 1,
	),

	'INSTANCES' => array(
		'main_config' => array('class' => 'Z_Config'),
		'request' => array('class' => 'Z_Input', 'config' => array()),
		'viewer' => array('class' => 'Z_Viewer', 'config' => array()),
		'xmlman' => array('class' => 'Z_XMLManager', 'config' => array()),
		'task_model' => array('model' => 'Task', 'config' => array('instance'=>'main_config', 'branch'=>'/tasks_model')),
		'domain_model' => array('model' => 'Domain', 'config' => array()),
		'db1' => array('class'=>'Z_Mysqli', 'config'=>array('file'=>APP_CONFIG_PATH.'config.php', 'branch'=>'/db1')),
		'logger' => array('class' => 'Z_Logger', 'config' => array('instance' => 'main_config', 'branch'=>'/logs/web')),
	),

	'DEPENDENCIES' => array(
		'class Z_WebApplication' => array(
			'interface iInput' => 'instance request',
			'interface iViewer' => 'instance viewer',
			'interface iXMLManager' => 'instance xmlman',
			'interface iDatabase' => 'instance db1',
			'interface iLogger' => 'instance logger',
			'controllers' => array(

			),
			'models' => array(

			),
		)
	)
);