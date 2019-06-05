<?php
if($session) {
    \header('Location: ../index.php');
    exit;
}

$errors = array();

if(isset($_POST['login'])) {
    if(!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = $_POST['name'];
        $password = pbkdf2($name, $_POST['password'], $config['password_salt']);
        
        if(valid_name($name, $config['alphanumeric_names']) === false) {
			$errors[] = "Invalid username.";
	}

        if(empty($errors)) {
            $fetchUser = $db->prepare('SELECT password FROM accounts WHERE name = :name');
            $fetchUser->bindParam(':name', $name);
            $fetchUser->execute();
            $fetchUser = $fetchUser->fetch(PDO::FETCH_OBJ);
            
            if($fetchUser) {
                if($fetchUser->password === $password) {
                    session_regenerate_id(true);
                    $_SESSION[$config['session_name']] = $name;
                    \header('Location: '.$config['base_url'].'/index.php');
                    exit;
                } else {
                    $errors[] = "Wrong username or password."; // incorrect password
                }
            } else {
                $errors[] = "Wrong username or password."; // user not found
            }
        }
    } else {
        $errors[] = "Missing fields.";
    }
}
?>
