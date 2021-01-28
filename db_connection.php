<?php

	// mysql_connect
	// mysqli_connect
	//PDO 12 DATABASES
	$servername=$_SERVER['SERVER_NAME'];
	
	$DSN="mysql:host=$servername;dbname=docan;charset=utf8";
	$USER='root';
	$PASS='123123';
	$option=array (PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');
	
	
	try{

			$con=new PDO($DSN,$USER,$PASS,$option);
			//echo"Connected";
	}
	catch(PDOException $e)
	{
	
			exit($e->getMessage());
	
	}






?>



