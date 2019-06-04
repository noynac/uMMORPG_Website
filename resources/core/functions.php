<?php
function pbkdf2(string $username, string $password, string $passwordSalt)
{   
    $iterations = 10000;
    $length = 40;
    $salt = $passwordSalt . $username;
        
    $hash = hash_pbkdf2("sha1", $password, $salt, $iterations, $length);
    $hash = \strtoupper($hash);
    return $hash;
}

function valid_name(string $username, bool $alphanumeric)
{  
    if($alphanumeric === true) {
        if(!\ctype_alnum($username)) {
            return false;
        }
    } else {
		$filterName = \stripslashes(\str_replace('/', "", \strip_tags($username)));
        if($username !== $filterName) {
            return false;
        }
    }
	return true;
}
?>