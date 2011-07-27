<?php
/**
 * User: Master
 * Date: 24.07.11
 * Time: 5:10
 */
 
class ToolApplication extends Z_ToolApplication {

	function __construct(iFactory $factory, iConfig $config, array $argv = array()){
		parent::__construct($factory, $config, $argv);
		$this->db = $this->factory->getObjectByInterface('iDatabase');
	}

	function db_init(){
		if (!$this->db->isTableExists('#__schema_migrations')){
			$this->db->query(
				"CREATE TABLE `#__schema_migrations` ("
					." `id` char(20) NOT NULL ,"
					." PRIMARY KEY ( `id` )"
				." ) ENGINE = MYISAM DEFAULT CHARSET=utf8"
			);
		}
	}

	function db_add_migration(){
		$this->_add_migration(APP_MIGRATIONS_PATH);
	}

	function db_migrate(){
		if ($this->db->isTableExists('#__schema_migrations')){
			$res = $this->db->query("SELECT `id` FROM `#__schema_migrations`");
			$exists_migrations = array();
			foreach($res->result_array() as $r){
				$exists_migrations[] = $r['id'];
			}
			$migrations_app_path = APP_MIGRATIONS_PATH;
			$app_files = scandir($migrations_app_path);
//			$migrations_core_path = $this->config->item('sysdb_core_migrations_path');
//			$core_files = scandir($migrations_core_path);
//			$files = array_merge($app_files, $core_files);
			$files = $app_files;
			sort($files);
			foreach($files as $file){
				if (preg_match('#^(\d+)(:?_(\w+))?\.php$#', $file, $m)){
//					if (in_array($file, $core_files)){
//						$migrations_path = $migrations_core_path;
//					} else {
						$migrations_path = $migrations_app_path;
//					}
					include ($migrations_path . $file);
					$migration_id = $m[1];
					$migration_class_name = 'Migration_'.$migration_id;
					if (!in_array($migration_id, $exists_migrations)){
						$migration = $this->factory->getMigration($migration_id);
						if ($migration->up()){
							$this->db->query("INSERT INTO `#__schema_migrations` SET `id`='$migration_id'");
							print ($migration_id . ": ok\r\n");
						} else {
							print ($migration_id . ': fail<br/>');
							break;
						}
					}
				}
			}
			print 'done';
			die;
		} else {
			die ('not found base schema table');
		}
//		$output = $this->load->core_view('sysdb/migrate');
//		header('Content-Type: text/html; charset='.$this->config->item('charset'));
//		echo $output;
	}

	private function _add_migration($path, $up_query = '', $down_query = ''){
		$migration_ts = date('YmdHis');
		$migration_filename = $migration_ts . '.php';
		$migration_file_content = <<<HEREDOC
<?php

/**
 * This migration created via console command
 */
class Migration_{$migration_ts} extends Z_Migration{

	function up(){
		return \$this->query("$up_query");
	}

	function down(){
		return \$this->query("$down_query");
	}

}
HEREDOC;
		if (!file_exists($path . $migration_filename)){
			$f = fopen($path . $migration_filename, 'w') or die ('cannot open file '.$path . $migration_filename.' for write');
			fwrite($f, $migration_file_content);
			fclose($f);
			die ('migration '. $path . $migration_filename . ' created');
		} else {
			die ('file '.$path . $migration_filename.' already exists');
		}
	}

}
