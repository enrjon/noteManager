<?php

	//connection variables
	$host = 'localhost';
	$user = 'root';
	$password = '*****';

	//create mysql connection
	$mysqli = new mysqli($host,$user,$password);
	if($mysqli->connect_errno){
		printf("Connection failed: %s\n", $mysqli->connect_error);
		die();
	}

	//create the database
	if(!$mysqli->query('CREATE DATABASE accounts')){
		printf("Errormessage: %s\n", $mysqli->error);
	}

	//create users table
	$mysqli->query('
	CREATE TABLE `users` (
  `id` bigint(64) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;') or die($mysqli->error);

	//create notes table
	$mysqli->query('
	CREATE TABLE IF NOT EXISTS `note` (
  `noteID` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` bigint(64) NOT NULL,
  PRIMARY KEY (`noteID`),
  UNIQUE KEY `noteID` (`noteID`),
  KEY `userID` (`userID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;') or die($mysqli->error);

	//creates test user
	$mysqli->query('
	INSERT INTO c1.users (name, email, password)
	VALUES (`testName`,`test@email.com`,`$sh4rpspr1nG$`);') or die($mysqli->error);

?>
