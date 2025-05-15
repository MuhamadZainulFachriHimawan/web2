<?php
require_once '../../config/connection.php';

use config\Connection;

$pdo = Connection::make();

require_once '../../models/pembayaran.php';
$obj = new Pembayaran($pdo);
$obj->delete($_GET['id']);

header("Location: index.php");
exit;
