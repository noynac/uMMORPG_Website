<?php
/*
please read: 	
	It is suggested to set 'display_conn_errors' to false during production.
	
	Please remember to only use https on 'base_url' if you actually have ssl, 
	otherwise use http. 
	
	I highly suggest changing the 'pasword_salt' as well, instructions on how to do
	that can be found in the readme file under "Configuration Options". However, it 
	is important to know that once the salt is changed, no pre-existing accounts will 
	be able to login.

	-- The login WILL NOT WORK if you have spaces in your session_name. --
*/
$config = array(
	'base_url' => 'https://mywebsite.com',
	'database_type' => 'SQLite',
	'database_SQLite_location' => '/var/databaseFolder/',
	'database_SQLite_name' => 'Database.sqlite',
	'database_MySQL_host' => 'localhost',
	'database_MySQL_user' => 'root',
	'database_MySQL_password' => 'password',
	'database_MySQL_name' => 'database',
	'display_conn_errors' => true,
	'password_salt' => 'at_least_16_byte',
	'has_ssl' => false,
	'alphanumeric_names' => true,
	'project_name' => 'My Website',
	'session_name' => 'MyWebsite'
);
?>