<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/kartu_diskon.php';
$obj = new KartuDiskon($pdo);
$obj->delete($_GET['id']);

header("Location: index.php");
exit;
