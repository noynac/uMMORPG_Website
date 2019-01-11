<?php
if (!function_exists('pbkdf2')) {
	function pbkdf2($username,$password) {
	    global $config; // that way we can get the password_salt
		
		$iterations = 10000;
		$length = 40;
		$salt = $config['password_salt'].$username;

		$hash = hash_pbkdf2("sha1", $password, $salt, $iterations, $length);
		$hash = strtoupper($hash);
		return $hash;
	}
}
?>