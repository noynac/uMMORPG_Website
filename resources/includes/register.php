<?php
if($session) {
    \header('Location: ../index.php');
    exit;
}

$errors = array();

if(isset($_POST['register'])) {
    if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
        $name = $_POST['name'];
        $password = pbkdf2($name, $_POST['password'], $config['password_salt']);
        $confirmPassword = pbkdf2($name, $_POST['confirmPassword'], $config['password_salt']);
        
        if($password !== $confirmPassword) {
            $errors[] = "Password and confirm password do not match.";
        }
        
        if(valid_name($name, $config['alphanumeric_names']) === false) {
		$errors[] = "Invalid username.";
	}
        
        if(empty($errors)) {
            $checkName = $db->prepare('SELECT count(*) FROM accounts WHERE name = :name');
            $checkName->bindParam(':name', $name);
            $checkName->execute();
            $exists = $checkName->fetchColumn();
            
            if($exists == 0) {
                $createAccount = $db->prepare("INSERT INTO accounts (name, password, banned) VALUES (:name,:password,:banned)");
                $createAccount->bindParam(':name', $name);
                $createAccount->bindParam(':password', $password);
                $createAccount->bindValue(':banned', 0);
                $createAccount->execute();
                
                session_regenerate_id(true);
                $_SESSION[$config['session_name']] = $name;
                \header('Location: '.$config['base_url'].'/index.php');
                exit;
            } else {
                $errors[] = "That name is already taken."; // user already exists
            }
        }
    } else {
        $errors[] = "Missing fields.";
    }
}
?>
