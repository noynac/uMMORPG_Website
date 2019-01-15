<?php
require($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php');
session_destroy();
session_regenerate_id(true);
\header("Location: ../");
die();
?>