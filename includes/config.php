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
	"has_ssl" => false,
	"alphanumeric_names" => true,
	"project_name" => "uMMORPG"
);

// password hashing
if (!function_exists('pbkdf2')) {
function pbkdf2($username,$password) {
    $iterations = 10000;"at_least_16_byte";
    $length = 40;
    $password_salt = "at_least_16_byte"; // THIS IS THE PASSWORD SALT
    $salt = $password_salt.$username;

    $hash = hash_pbkdf2("sha1", $password, $salt, $iterations, $length);
    $hash = strtoupper($hash);
    return $hash;
}
}
?>