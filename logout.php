<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php');
session_start();

unset($_SESSION[$config['project_name']]);

if(session_destroy()){
    header("Location: ../");
    die();
}
?>