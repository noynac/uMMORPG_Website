<?php
include($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php');
session_start();

unset($_SESSION[$config['project_name']]);

session_regenerate_id(true);

if(session_destroy()){
    header("Location: ../");
    die();
}
?>