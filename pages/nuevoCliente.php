<?php
require_once "autoloader.php";

$helios = new HeliosCorp();
if (count($_POST) > 0) $helios->new($_POST);

