# noteManager
Author: Enrique Pinedo

Note Management System
-----------------------
This is a small note management system. This system will accept new user information and update database: c1 with a name, email, password(stored in hash), associated hash, creatation/update timestamps, and if user is active(registered).


System requirements
-------------------
Uses XAMPP stack
Uses mail funtion for email verifaction, must update php.ini to appropriate SMTP

SQL
---
In order to set up database and insert test user, run the following SQL scripts:

          CREATE DATABASE c1;
          
          CREATE TABLE `users` (
            `id` bigint(64) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `updated_at` timestamp NULL DEFAULT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            UNIQUE KEY `email` (`email`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
          
          CREATE TABLE IF NOT EXISTS `note` (
            `noteID` int(11) NOT NULL AUTO_INCREMENT,
            `content` longtext,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `userID` bigint(64) NOT NULL,
            PRIMARY KEY (`noteID`),
            UNIQUE KEY `noteID` (`noteID`),
            KEY `userID` (`userID`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
          
          INSERT INTO c1.users (name, email, password)
          VALUES ('testName','user@email.com','$sh4rpspr1nG$');
          
Alternatively, you can run login/sql/sql_import.php and create and account through index.php. Connection variables can be adjusted here.

Please adjust db.php parameters to allow for proper database connection.
