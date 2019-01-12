<?php
if(!function_exists('pbkdf2')) {
    function pbkdf2($username, $password)
    {
        global $config; // that way we can get the password_salt value
        
        $iterations = 10000;
        $length = 40;
        $salt = $config['password_salt'] . $username;
        
        $hash = hash_pbkdf2("sha1", $password, $salt, $iterations, $length);
        $hash = strtoupper($hash);
        return $hash;
    }
}

// figured I'd put this here since both login and register use it
if(!function_exists('valid_name')) {
    function valid_name($username)
    {
        global $config; // that way we can get the alphanumeric_names value
        
        if($config['alphanumeric_names'] == true) {
            if(!ctype_alnum($username)) {
                return false;
            }
        } else {
            $filterName = stripslashes(str_replace('/', "", strip_tags($username)));
            if($username != $filterName) {
                return false;
            }
        }
		return true;
    }
}
?>