<?php

ini_set('display_errors','on');

	include 'config.php';
		
		function DB_connect($conf){
			
			try{
				$db=new PDO($conf['driver'].':host='.$conf['dbhost'].';dbname='.$conf['dbname'],$config['dbuser'],$config['dbpass']);	
				return $db;

			}catch(PDOException $e){
				echo '<p>Error: '. $e->getMessage().'</p>';
				die;
				exit;
			}
		}


 	
 	$gbd=null;
