<?php
// note: it is highly suggested to set "display_conn_errors" to false during production.
$config = array(
	"database_type" => "SQLite",
	"database_SQLite_location" => "/var/",
	"database_SQLite_name" => "Database.sqlite",
	"database_MySQL_host" => "localhost",
	"database_MySQL_user" => "root",
	"database_MySQL_password" => "password",
	"database_MySQL_DBname" => "database",
	"display_conn_errors" => true,
	"password_salt" => "at_least_16_byte",
	"has_ssl" => false,
	"alphanumeric_names" => true,
	"project_name" => "uMMORPG"
);
?>