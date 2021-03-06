<?php
ob_start();
session_start();

defined ("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined ("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");
defined ("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

//Defines information for database connection.
defined ("DB_HOST") ? null : define("DB_HOST", "localhost");
defined ("DB_USER") ? null : define("DB_USER", "rjsoltes");
defined ("DB_PASS") ? null : define("DB_PASS", "cybereye");
defined ("DB_NAME") ? null : define("DB_NAME", "cybereye");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
require_once("functions.php");
require_once("PHPMailerAutoload.php");
?>
