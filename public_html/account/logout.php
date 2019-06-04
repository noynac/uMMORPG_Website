<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../resources/core/init.php');
session_destroy();
session_regenerate_id(true);
\header('Location: '.$config['base_url'].'');
die();
?>