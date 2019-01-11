<?php
$thisFile = basename($_SERVER["SCRIPT_FILENAME"], '.php');
if($thisFile == "register.php") {
    header('Location: ../index.php');
    exit;
}

if($session) {
	header('Location: ../index.php');
	exit;
}

$errors = array();

if(isset($_POST['register'])) {
    if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {        
        $name = $_POST['name'];
        $password = pbkdf2($name, $_POST['password']);
        $confirmPassword = pbkdf2($name, $_POST['confirmPassword']);

		if($password != $confirmPassword) {
			$errors[] = "Password and confirm password do not match.";
		}

        if($config['alphanumeric_names'] == true) {
            if(!ctype_alnum($name)) {
                $errors[] = "Invalid username.";
            }
        } else {
            $filterName = stripslashes(str_replace('/', "", strip_tags($name)));
            if($name != $filterName) {
                $errors[] = "Invalid username.";
            }
        }

        if(empty($errors)) {
            $checkName = $db->prepare('SELECT count(*) FROM accounts WHERE name = :name');
            $checkName->bindParam(':name', $name);
            $checkName->execute();
            $exists = $checkName->fetchColumn();
            
            if($exists == 0) {
				$banned = 0;
				$createAccount = $db->prepare("INSERT INTO accounts (name, password, banned) VALUES (:name,:password,:banned)");
				$createAccount->bindParam(':name', $name);
				$createAccount->bindParam(':password', $password);
				$createAccount->bindParam(':banned', $banned);
				$createAccount->execute();

				session_regenerate_id();
				$_SESSION[$config['project_name']] = $name;
				header('Location: ../index.php');
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