<?php
require_once ("autoloader.php");
$security = new Security();

$security->logIn($_POST);